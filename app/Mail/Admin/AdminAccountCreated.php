<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminAccountCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $admin;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminData, $password)
    {
        $this->admin = $adminData;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->admin['name'] . ' - Admin Account Created';

        return $this->subject($subject)
            ->view('mail.admin.account-created');
    }
}
