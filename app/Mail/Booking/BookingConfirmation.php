<?php

namespace App\Mail\Booking;

use App\Models\SystemConfig;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

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
        $name = $this->data['name'];
        $subject = $this->data['name'] . ' - booking on ' . $submissionDate;
        $systemConfig = SystemConfig::first();

        $pdfContent = view('mail.booking.invoice', ['data' => $this->data, 'systemConfig' => $systemConfig])->render();
        $pdf = PDF::loadHTML($pdfContent);

        $pdfFileName = $name . '_' . $submissionDate . '_invoice.pdf';
        $pdfPath = 'booking_confirmations/' . now()->format('YmdHis') . '_' . $pdfFileName;
        Storage::put($pdfPath, $pdf->output());

        return $this->subject($subject)
            ->view('mail.booking.booking-confirmation')
            ->attach(storage_path('app/' . $pdfPath), [
                'as' => $pdfFileName,
                'mime' => 'application/pdf',
            ]);
    }
}
