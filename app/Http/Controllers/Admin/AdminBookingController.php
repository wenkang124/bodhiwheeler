<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Driver;
use App\Services\OnsendService;
use App\Services\BookingPriceCalculation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminBookingController extends Controller
{
    protected $onsendService;
    protected $bookingPriceCalculator;

    public function __construct(OnsendService $onsendService, BookingPriceCalculation $bookingPriceCalculator)
    {
        $this->onsendService = $onsendService;
        $this->bookingPriceCalculator = $bookingPriceCalculator;
    }

    public function create()
    {
        $packages = Package::all();
        $drivers = Driver::where('status', 'active')->get();

        return view('admin.booking.admin-create', compact('packages', 'drivers'));
    }

    public function store(Request $request)
    {
        $package = Package::find($request->package_id);

        $rules = [
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'required|string',
            'pick_up_date' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attribute, $value, $fail) {
                    $date = Carbon::parse($value);
                    if ($date->year == 2025 && $date->month == 1 && $date->day >= 28 && $date->day <= 31) {
                        $fail('Bookings are not available from January 28-31, 2025.');
                    }
                }
            ],
            'pick_up_time' => 'required',
            'return_time' => 'nullable',
            'no_of_charter_hours' => 'nullable|integer|min:3',
            'pick_up_address' => 'required|string',
            'drop_off_address' => 'required|string',
            'no_of_passenger' => 'required|integer|min:1',
            'no_of_wheelchair_pax' => 'required|integer|min:0',
            'package_id' => 'required|exists:packages,id',
            'distance' => 'required|numeric|min:0',
            'active_tab' => 'required|string',
        ];

        // Add conditional validation for Charter package
        if ($request->active_tab === 'Charter') {
            $rules['no_of_charter_hours'] = 'required|integer|min:3';
        }

        // Add conditional validation for Return package
        if ($request->active_tab === 'Return') {
            $rules['return_time'] = 'required';
        }

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('active_tab', $request->active_tab);
        }

        $booking = new Booking([
            'name' => $request->name,
            'email' => $request->email,
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
            'distance' => $request->distance ?? 0,
            'remarks' => $request->remarks,
            'email_reminder_sent' => false,
            'status' => 'submitted', // Admin bookings need super admin approval
            'created_by_admin' => Auth::guard('admin')->id(),
        ]);

        $booking->package()->associate($package);
        $booking->driver_id = $request->driver_id;
        $booking->save();

        // Calculate price using the same logic as public bookings
        $this->bookingPriceCalculator->calculatePrice($package->id, $booking);

        // Send WhatsApp notification with admin info
        $this->sendAdminBookingNotification($booking);

        Session::flash('alert-success', 'Booking created successfully and submitted for super admin approval');
        return redirect()->route('admin.booking.pending-approval');
    }

    private function sendAdminBookingNotification(Booking $booking)
    {
        if (env('APP_ENV') === 'production') {
            $admin = Auth::guard('admin')->user();

            $messageContent = "*New Booking Created by Admin - Pending Approval*\n\n";
            $messageContent .= "*Created by:* " . $admin->name . " (" . $admin->email . ")\n";
            $messageContent .= "*Status:* Pending Super Admin Approval\n\n";
            $messageContent .= "*Customer Details:*\n";
            $messageContent .= "*Name:* " . $booking->name . "\n";
            $messageContent .= "*Email:* " . $booking->email . "\n";
            $messageContent .= "*Phone:* " . $booking->phone . "\n\n";

            $messageContent .= "*Trip Details:*\n";
            $messageContent .= "*Pick-up Date:* " . $booking->pick_up_date . "\n";
            $messageContent .= "*Pick-up Time:* " . $booking->pick_up_time . "\n";
            $messageContent .= "*Pick-up Address:* " . $booking->pick_up_address . "\n";
            $messageContent .= "*Drop-off Address:* " . $booking->drop_off_address . "\n";
            $messageContent .= "*Passengers:* " . $booking->no_of_passenger . "\n\n";

            $messageContent .= "*Total Price:* $" . number_format($booking->total_price, 2) . "\n\n";
            $messageContent .= "Powered by *bodhiwheeler.org*";

            $phoneNumber = env('WHATSAPP_RECEIVER');
            $this->onsendService->sendWhatsAppMessage($phoneNumber, $messageContent, []);
        }
    }
}
