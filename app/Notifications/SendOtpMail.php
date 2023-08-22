<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpMail extends Notification
{
    use Queueable;

    public $otp;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($otp, $message = null)
    {
        $this->otp = $otp;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        if (is_null($this->message)) {
            $this->message = 'You are receiving this email because we received an OTP request for your account. code is:' . $this->otp;
        }
        return (new MailMessage)
            ->success()
            ->subject('OTP Request')
            ->from(config('app.app_mail'), config('app.name'))
            ->line($this->message)
            ->line('If you did not request an OTP(One Time Password) code, no further action is required.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
