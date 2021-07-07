<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Mail\PasswordResetMail;

class PasswordResetNotification extends Notification
{
    use Queueable;

    private $token;

    public function __construct($in_token)
    {
        $this->token = $in_token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new PasswordResetMail($this->token))
            ->to($notifiable->email);
    }
}
