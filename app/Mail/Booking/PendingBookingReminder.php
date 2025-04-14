<?php

namespace App\Mail\Booking;

use App\Models\SystemConfig;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendingBookingReminder extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Reminder: Complete Your Booking with BodhiWheeler';
        $systemConfig = SystemConfig::first();

        return $this->subject($subject)
            ->view('mail.booking.pending-reminder', [
                'booking' => $this->booking,
                'systemConfig' => $systemConfig
            ]);
    }
}
