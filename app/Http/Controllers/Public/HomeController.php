<?php

namespace App\Http\Controllers\Public;


use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Package;
use App\Models\SystemConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Services\BookingPriceCalculation;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $bookingPriceCalculator;

    public function __construct(BookingPriceCalculation $bookingPriceCalculator)
    {
        $this->bookingPriceCalculator = $bookingPriceCalculator;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('public.home');
    }

    public function aboutUs()
    {
        return view('public.about-us');
    }

    public function services()
    {
        return view('public.services');
    }

    public function booking()
    {
        $packages = Package::all();
        return view('public.booking', compact('packages'));
    }

    public function submitBooking(Request $request)
    {
        // Google Recaptchat Validation
        if (env('APP_ENV') === 'production') {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                'response' => $request->get('g-recaptcha-response'),
            ]);

            if (!$response->json()['success']) {
                abort('401');
            }
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'pick_up_date' => 'required|date|after_or_equal:today',
            'pick_up_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    $pickupTime = Carbon::createFromFormat('H:i', $value);

                    if ($pickupTime->hour < 7 || ($pickupTime->hour === 21 && $pickupTime->minute !== 0) || $pickupTime->hour >= 22) {
                        $fail('The pick-up time must be between 07:00 and 21:00.');
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
                    $validator->errors()->add('medical_escort', 'For Return package, return time must more than 3 hours from pick up time.');
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

        $booking->package()->associate($package);

        $booking->save();

        //Booking Total Price Calculation
        $this->bookingPriceCalculator->calculatePrice($package->id, $booking);

        return redirect()->route('booking.confirmation', ['booking_id' => $booking->id]);
    }

    public function editBooking($booking_id)
    {
        $packages = Package::all();
        $booking = Booking::where(['id' => $booking_id, 'status' => 'pending'])->first();
        if (!$booking) {
            abort(404);
        }

        return view('public.edit-booking', compact('booking', 'packages'));
    }

    public function updateBooking(Request $request)
    {
        // Google Recaptchat Validation
        if (env('APP_ENV') === 'production') {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                'response' => $request->get('g-recaptcha-response'),
            ]);

            if (!$response->json()['success']) {
                abort('401');
            }
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'pick_up_date' => 'required|date|after_or_equal:today',
            'pick_up_time' => 'required|date_format:H:i',
            'return_time' => ['nullable', 'date_format:H:i', 'after:pick_up_time'],
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
                    $validator->errors()->add('medical_escort', 'For Return package, return time must more than 3 hours from pick up time.');
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

        $booking = Booking::findOrFail($request->booking_id);

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

        return redirect()->route('booking.confirmation', ['booking_id' => $booking->id]);
    }

    public function bookingConfirmation($booking_id)
    {
        $systemConfig = SystemConfig::first();
        $booking = Booking::where(['id' => $booking_id, 'status' => 'pending'])->first();
        if (!$booking) {
            abort(404);
        }
        return view('public.booking-confirmation', ['booking' => $booking, 'systemConfig' => $systemConfig]);
    }

    public function submitConfirmation(Request $request)
    {
        // Google Recaptchat Validation
        if (env('APP_ENV') === 'production') {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                'response' => $request->get('g-recaptcha-response'),
            ]);

            if (!$response->json()['success']) {
                abort('401');
            }
        }

        $validator = Validator::make(
            $request->all(),
            [
                'booking_id' => 'required|exists:bookings,id',
                'payment_receipt' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ],
        );

        if ($validator->fails()) {
            Session::flash('error', 'Fail submitted Enquiry. ' . $validator->errors()->first());
            return redirect()->back();
        }

        $booking = Booking::find($request->booking_id);
        $booking->status = "submitted";

        //Upload Payment Receipt
        if ($request->hasFile('payment_receipt')) {
            $imagePath = $request->file('payment_receipt')->store('payment_receipts', 'public');
            $booking->payment_receipt = $imagePath;
        }

        $booking->save();

        if (env('APP_ENV') === 'production') {
            Mail::to('bodhiwheelers@gmail.com')->send(new \App\Mail\Booking\BookingConfirmation($booking));
        }

        return view('public.success-booking');
    }

    public function pricing()
    {
        return view('public.pricing');
    }

    public function faq()
    {
        return view('public.faq');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function submitContact(Request $request)
    {
        // Google Recaptchat Validation
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
            'response' => $request->get('g-recaptcha-response'),
        ]);

        if (!$response->json()['success']) {
            abort('401');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Fail submitted Enquiry. ' . $validator->errors()->first());
            return redirect()->back();
        }

        if (env('APP_ENV') === 'production') {
            Mail::to('bodhiwheelers@gmail.com')->send(new \App\Mail\ContactUs\Enquiry($request->all()));
        }


        Session::flash('success', 'Successfully submitted Enquiry.');
        return redirect()->back();
    }
}
