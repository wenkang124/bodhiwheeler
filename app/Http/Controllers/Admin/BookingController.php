<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Driver;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BookingController extends Controller
{
    public function edit(Booking $booking)
    {
        // Get all drivers
        $allDrivers = Driver::where('status', 'active')->get();

        $startTime = Carbon::parse($booking->pick_up_date . ' ' . $booking->pick_up_time);
        $endTime = $booking->return_time
            ? Carbon::parse($booking->return_time)
            : $startTime->addHours($booking->no_of_charter_hours);

        // Include the driver of the current booking
        $availableDrivers = $allDrivers->filter(function ($driver) use ($startTime, $booking) {
            // Include the driver of the current booking
            if ($driver->id === $booking->driver_id) {
                return true;
            }

            // Check for overlapping time range with other bookings of the driver
            foreach ($driver->bookings as $otherBooking) {
                $otherStartTime = Carbon::parse($otherBooking->pick_up_date . ' ' . $otherBooking->pick_up_time);
                $otherEndTime = $otherBooking->return_time
                    ? Carbon::parse($otherBooking->return_time)
                    : $otherStartTime->addHours($otherBooking->no_of_charter_hours);

                // Check for overlapping start times
                if ($startTime == $otherStartTime) {
                    return false; // Overlapping, exclude the driver
                }
            }

            return true; // No overlapping, include the driver
        });

        return view('admin.booking.edit', compact('booking', 'availableDrivers'));
    }




    public function update(Request $request, Booking $booking)
    {
        $this->validate($request, [
            'driver_id' => 'required|exists:drivers,id',
        ]);

        $booking->driver_id = $request->input('driver_id');
        $booking->save();

        Session::flash('alert-success', 'Successfully Updated');

        return redirect()->route('admin.booking.edit', $booking);
    }
}
