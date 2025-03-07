<?php

namespace App\Notifications;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CompanyCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $company;

    /**
     * Create a new notification instance.
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Get the notification's delivery channels.
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
            ->subject('New Company Created: Approval Required')
            ->greeting('Hello Admin,')
            ->line('A new company has been created and requires your approval.')
            ->line('Company Name: ' . $this->company->name)
            ->action('Review Company', url('/admin/companies/' . $this->company->id))
            ->line('Thank you for managing the platform.');
    }

    /**
     * Get the database notification representation.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'A new company (' . $this->company->name . ') requires approval.',
            'url' => url('/admin/companies/' . $this->company->id),
        ];
    }
}
