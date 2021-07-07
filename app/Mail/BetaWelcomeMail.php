<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BetaWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $user;

    public function __construct($in_user, $in_token)
    {
        $this->user = $in_user;
        $this->token = $in_token;
    }

    public function build()
    {
        return $this->from('welcome@mail.cropapp.it')
                    ->subject('Crop Beta')
                    ->view('mail.beta_welcome');
    }
}
