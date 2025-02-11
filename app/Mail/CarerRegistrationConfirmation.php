<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarerRegistrationConfirmation extends Mailable
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
        return $this->subject('Thank You for Your Interest - CarePass')->view('emails.carer-registration-confirmation')->with('carerData', $this->carerData);
    }
}
