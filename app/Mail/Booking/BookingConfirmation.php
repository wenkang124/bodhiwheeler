<?php

namespace App\Mail\Booking;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $submissionDate = $this->data['created_at']->format('Y-m-d H:i:s');

        $subject = $this->data['name'] . ' - booking on ' . $submissionDate;

        return $this->subject($subject)
            ->view('mail.booking.booking-confirmation');
    }
}
