<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceUserActivation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $activationToken;

    public function __construct($user, $activationToken)
    {
        $this->user = $user;
        $this->activationToken = $activationToken;
    }

    public function build()
    {
        return $this->subject('Activate Your Account - ' . config('app.name') . " - " . $this->activationToken)
            ->view('emails.service_user_activation')
            ->with([
                'user' => $this->user,
                'activationToken' => $this->activationToken
            ]);
    }
}
