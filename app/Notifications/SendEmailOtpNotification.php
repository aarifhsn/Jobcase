<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailOtpNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected int $otp;

    /**
     * Create a new notification instance.
     */
    public function __construct(int $otp)
    {
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Here is your OTP for verification: ' . $this->otp)
            ->line('Please verify your email to access the panel.')
            ->action('Verify Now', url('/verify-otp?email=' . urlencode($notifiable->email) . '&otp=' . encrypt($this->otp)))
            ->line('Thank you for joining us!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable) {}
}
