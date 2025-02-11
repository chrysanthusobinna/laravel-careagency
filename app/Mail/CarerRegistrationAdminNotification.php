<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarerRegistrationAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $carerData;


    // Create a new message instance.
   
    public function __construct($carerData)
    {
        $this->carerData = $carerData;
    }


    // Build the message.

    public function build()
    {
        return $this->subject('New Carer Registration Interest - CarePass')->view('emails.carer-registration-admin')->with('carerData', $this->carerData);
    }
}
