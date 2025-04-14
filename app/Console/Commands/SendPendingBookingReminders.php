<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\Booking\PendingBookingReminder;

class SendPendingBookingReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders to customers with pending bookings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting to send pending booking reminders...');

        // Find all pending bookings with email that haven't received a reminder yet
        $pendingBookings = Booking::where('status', 'pending')
            ->whereNotNull('email')
            ->where('email', '!=', '')
            ->where('email_reminder_sent', false)
            ->get();

        $this->info("Found {$pendingBookings->count()} pending bookings that need reminders.");

        $sentCount = 0;

        foreach ($pendingBookings as $booking) {
            try {
                // Send email reminder
                Mail::to($booking->email)->send(new PendingBookingReminder($booking));

                // Update the booking to mark reminder as sent
                $booking->email_reminder_sent = true;
                $booking->save();

                $sentCount++;
                $this->info("Sent reminder for booking ID: {$booking->id} to {$booking->email}");
            } catch (\Exception $e) {
                $this->error("Failed to send reminder for booking ID: {$booking->id}. Error: {$e->getMessage()}");
            }
        }

        $this->info("Completed sending reminders. Successfully sent: {$sentCount}");

        return 0;
    }
}
