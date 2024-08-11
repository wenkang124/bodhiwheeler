<?php

namespace App\Http\Controllers\Admin;

use Form;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Services\BookingPriceCalculation;
use Illuminate\Support\Facades\Validator;

class PendingApprovalController extends Controller
{
    protected $bookingPriceCalculator;

    public function __construct(BookingPriceCalculation $bookingPriceCalculator)
    {
        $this->bookingPriceCalculator = $bookingPriceCalculator;
    }

    public function index()
    {
        return view('admin.booking.pending-approval.index');
    }

    public function pendingReviewQuery(Request $request)
    {
        $result = Booking::where('status', 'submitted');

        return DataTables::of($result)
            ->editColumn('name', function ($row) {
                return $row->name;
            })
            ->editColumn('phone', function ($row) {
                return $row->phone;
            })
            ->editColumn('package_name', function ($row) {
                return $row->package_name;
            })
            ->editColumn('status', function ($row) {
                return '<span class="text-primary">' . ucfirst($row->status) . '</span>';
            })
            ->addColumn('details', function ($row) {
                $details = '<td>';
                $details .= '<strong>Pick-up Address:</strong> ' . $row->pick_up_address . '<br>';
                $details .= '<strong>Drop Off Address:</strong> ' . $row->drop_off_address . '<br>';
                $details .= '<strong>Pick-up Time:</strong> ' . $row->pick_up_time . '<br>';
                $details .= '</td>';
                return $details;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('actions', function ($row) {
                $actions = '<div class="d-flex flex-column gap-3">';
                $actions .= '<a href="' . route('admin.booking.pending-approval.detail', [$row->id, $row]) . '" class="btn btn-outline-info" style="width: 100%;">Details</a>';
                $actions .= '<a href="' . route('admin.booking.pending-approval.edit', [$row->id]) . '" class="btn btn-outline-primary" style="width: 100%;">Edit</a>';
                $actions .= '<input type="hidden" name="redirect" value="admin.me.task.payment-approval">';
                $actions .= '<button onclick="return confirm(\'Confirm Approve?\')" class="btn btn-outline-success" name="status" value="approved" style="width: 100%;">
                                <i class="fas fa-check"></i>
                                Approve
                            </button>';
                $actions .= Form::close();

                $actions .= Form::open(['route' => ['admin.booking.pending-approval.update-status', [$row->id, $row]]]);
                $actions .= '<input type="hidden" name="redirect" value="admin.me.task.payment-approval">';
                $actions .= '<button onclick="return confirm(\'Confirm Reject?\')" class="btn btn-outline-danger" name="status" value="rejected" style="width: 100%;">
                                <i class="fas fa-times"></i>
                                Reject
                            </button>';
                $actions .= Form::close();
                $actions .= '</div>';

                return $actions;
            })
            ->rawColumns(['name', 'phone', 'package_name', 'status', 'details', 'created_at', 'actions'])->make(true);
        return $result;
    }

    public function create()
    {
        return view('admin.booking.pending-approval.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'pick_up_date' => 'required|date|after_or_equal:today',
            'pick_up_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    $pickupTime = Carbon::createFromFormat('H:i', $value);

                    if ($pickupTime->hour < 7 || ($pickupTime->hour === 21 && $pickupTime->minute !== 0) || $pickupTime->hour >= 22) {
                        $fail('The pick-up time must be between 07:00 and 21:00.');
                    }

                    if ($request->input('active_tab') === "Return" && $pickupTime->hour >= 18) {
                        $fail('For Return package, the pick-up time must be before 18:00 as the operation time is till 21:00.');
                    }
                },
            ],
            'return_time' => [
                'nullable',
                'date_format:H:i',
                'after:pick_up_time',
                function ($attribute, $value, $fail) use ($request) {
                    if (!$value) {
                        return;
                    }

                    $returnTime = Carbon::createFromFormat('H:i', $value);

                    if ($returnTime->hour < 7 || ($returnTime->hour === 21 && $returnTime->minute !== 0) || $returnTime->hour >= 22) {
                        $fail('The return time must be between 07:00 and 21:00.');
                    }
                },
            ],
            'no_of_charter_hours' => $request->input('active_tab') === "Charter" ? 'required|integer|min:3' : 'nullable|integer',
            'pick_up_address' => 'required|string',
            'drop_off_address' => 'required|string',
            'no_of_passenger' => 'required|integer',
            'no_of_wheelchair_pax' => 'required|integer',
            'package_id' => ['required', 'exists:packages,id'],
            'distance' => ['required'],
        ], [
            'return_time.after' => "Return time must be a time after pick up time.",
            'no_of_charter_hours.min' => 'The number of charter hours must be at least 3.',
        ])->after(function ($validator) use ($request) {
            //* Custom Validation
            if ($request->input('active_tab') === "Return" && $request->input('return_time')) {
                $pickUpDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->input('pick_up_date') . ' ' . $request->input('pick_up_time'));
                $returnDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->input('pick_up_date') . ' ' . $request->input('return_time'));

                if ($returnDateTime->diffInHours($pickUpDateTime) < 3) {
                    $validator->errors()->add('return_time', 'For Return package, return time must more than 3 hours from pick up time.');
                }
            } else if ($request->input('active_tab') === "Charter") {
                $charter_hours = $request->no_of_charter_hours;
                if ($charter_hours < 3) {
                    $validator->errors()->add('medical_escort', 'For Charter package, charter hours must more than 3 hours');
                }
            }

            $pickUpDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->input('pick_up_date') . ' ' . $request->input('pick_up_time'));
            $currentDateTime = Carbon::now()->addMinutes(45);

            if ($pickUpDateTime->lte($currentDateTime)) {
                $validator->errors()->add('pick_up_time', 'The pick up time must be at least 45 minutes ahead of the current time.');
            }

            if (empty($request->input('distance'))) {
                $validator->errors()->add('pick_up_address', 'Please provide a valid pick up address.');
                $validator->errors()->add('drop_off_address', 'Please provide a valid drop off address.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $package = Package::find($request->package_id);

        $booking = new Booking([
            'name' => $request->name,
            'phone' => $request->phone,
            'pick_up_date' => $request->pick_up_date,
            'pick_up_time' => $request->pick_up_time,
            'return_time' => $request->return_time,
            'is_estimated_return_time' => $request->return_time ? false : true,
            'no_of_charter_hours' => $request->no_of_charter_hours,
            'pick_up_address' => $request->pick_up_address,
            'drop_off_address' => $request->drop_off_address,
            'no_of_passenger' => $request->no_of_passenger,
            'no_of_wheelchair_pax' => $request->no_of_wheelchair_pax,
            'package_name' => $package->name,
            // 'medical_escort' => $request->medical_escort ?? false,
            'distance' => $request->distance ?? 0,
            'remarks' => $request->remarks,
        ]);

        $booking->status = "submitted";

        $booking->package()->associate($package);

        $booking->save();

        //Booking Total Price Calculation
        $this->bookingPriceCalculator->calculatePrice($package->id, $booking);

        Session::flash('alert-success', 'Successfully Created');

        return redirect()->route('admin.booking.pending-approval');
    }

    public function detail(Booking $booking)
    {
        return view('admin.booking.pending-approval.detail', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        return view('admin.booking.pending-approval.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'pick_up_date' => 'required|date|after_or_equal:today',
            'pick_up_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    $pickupTime = Carbon::createFromFormat('H:i', $value);

                    if ($pickupTime->hour < 7 || ($pickupTime->hour === 21 && $pickupTime->minute !== 0) || $pickupTime->hour >= 22) {
                        $fail('The pick-up time must be between 07:00 and 21:00.');
                    }

                    if ($request->input('active_tab') === "Return" && $pickupTime->hour >= 18) {
                        $fail('For Return package, the pick-up time must be before 18:00 as the operation time is till 21:00.');
                    }
                },
            ],
            'return_time' => [
                'nullable',
                'date_format:H:i',
                'after:pick_up_time',
                function ($attribute, $value, $fail) use ($request) {
                    if (!$value) {
                        return;
                    }

                    $returnTime = Carbon::createFromFormat('H:i', $value);

                    if ($returnTime->hour < 7 || ($returnTime->hour === 21 && $returnTime->minute !== 0) || $returnTime->hour >= 22) {
                        $fail('The return time must be between 07:00 and 21:00.');
                    }
                },
            ],
            'no_of_charter_hours' => $request->input('active_tab') === "Charter" ? 'required|integer|min:3' : 'nullable|integer',
            'pick_up_address' => 'required|string',
            'drop_off_address' => 'required|string',
            'no_of_passenger' => 'required|integer',
            'no_of_wheelchair_pax' => 'required|integer',
            'package_id' => ['required', 'exists:packages,id'],
            'distance' => ['required'],
        ], [
            'return_time.after' => "Return time must be a time after pick up time.",
            'no_of_charter_hours.min' => 'The number of charter hours must be at least 3.',
        ])->after(function ($validator) use ($request) {
            //* Custom Validation
            if ($request->input('active_tab') === "Return" && $request->input('return_time')) {
                $pickUpDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->input('pick_up_date') . ' ' . $request->input('pick_up_time'));

                $returnDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->input('pick_up_date') . ' ' . $request->input('return_time'));

                if ($returnDateTime->diffInHours($pickUpDateTime) < 3) {
                    $validator->errors()->add('return_time', 'For Return package, return time must more than 3 hours from pick up time.');
                }
            } else if ($request->input('active_tab') === "Charter") {
                $charter_hours = $request->no_of_charter_hours;
                if ($charter_hours < 3) {
                    $validator->errors()->add('medical_escort', 'For Charter package, charter hours must more than 3 hours');
                }
            }

            $pickUpDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->input('pick_up_date') . ' ' . $request->input('pick_up_time'));
            $currentDateTime = Carbon::now()->addMinutes(45);

            if ($pickUpDateTime->lte($currentDateTime)) {
                $validator->errors()->add('pick_up_time', 'The pick up time must be at least 45 minutes ahead of the current time.');
            }

            if (empty($request->input('distance'))) {
                $validator->errors()->add('pick_up_address', 'Please provide a valid pick up address.');
                $validator->errors()->add('drop_off_address', 'Please provide a valid drop off address.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, $request->package_id)
                ->withInput();
        }

        $package = Package::find($request->package_id);

        $booking->fill([
            'name' => $request->name,
            'phone' => $request->phone,
            'pick_up_date' => $request->pick_up_date,
            'pick_up_time' => $request->pick_up_time,
            'return_time' => $request->return_time,
            'is_estimated_return_time' => false,
            'no_of_charter_hours' => $request->no_of_charter_hours,
            'pick_up_address' => $request->pick_up_address,
            'drop_off_address' => $request->drop_off_address,
            'no_of_passenger' => $request->no_of_passenger,
            'no_of_wheelchair_pax' => $request->no_of_wheelchair_pax,
            'package_name' => $package->name,
            // 'medical_escort' => $request->medical_escort ?? false,
            'distance' => $request->distance ?? 0,
            'remarks' => $request->remarks,
        ]);

        $booking->package()->associate($package);

        $booking->save();

        //Delete Booking Adjustments
        $booking->bookingAdjustments()->delete();

        //Booking Total Price Calculation
        $this->bookingPriceCalculator->calculatePrice($package->id, $booking);

        Session::flash('alert-success', 'Successfully Updated');

        return redirect()->route('admin.booking.pending-approval');
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $this->validate($request, [
            'status' => 'required|in:approved,rejected'
        ]);

        if ($request->get('status') === 'approved' && !$booking->driver_id) {
            Session::flash('alert-danger', 'Please assign a driver before approving the booking.');
            return redirect()->route('admin.booking.pending-approval');
        }

        $booking->status = $request->get('status');
        $booking->approved_at = now();
        $booking->approvedBy()->associate(auth()->user());
        $booking->save();

        Session::flash('alert-success', 'Successfully Updated');
        return redirect()->route('admin.booking.pending-approval');
    }

    public function sendMailNotification(Request $request, Booking $booking)
    {
        if (env('APP_ENV') === 'production') {
            Mail::to('bodhiwheelers@gmail.com')->send(new \App\Mail\Booking\BookingConfirmation($booking));
        }

        Session::flash('alert-success', 'Successfully Send Mail Notification');

        return redirect()->route('admin.booking.pending-approval');
    }

    public function adjustPrice(Request $request, Booking $booking)
    {
        $booking->total_price = $request->input('total_price');

        $booking->save();

        Session::flash('alert-success', 'Successfully Adjusted Total Price');

        return redirect()->route('admin.booking.pending-approval');
    }
}
