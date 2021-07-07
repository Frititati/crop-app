<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    private $token;

    public function __construct($in_token)
    {
        $this->token = $in_token;
    }

    public function build()
    {
        return $this->from('info@mail.cropapp.it')
                    ->view('mail.password_reset');
    }
}
