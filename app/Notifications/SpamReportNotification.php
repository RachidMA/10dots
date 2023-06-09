<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SpamReportNotification extends Notification
{
    use Queueable;
    public $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
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
        // Store the doer's email in the session
        session()->put('doer_email', $this->data['user']->email);
        $currentDate = Carbon::now()->format('Y-m-d');
        return (new MailMessage)
            ->subject('Spam Report Notification')
            ->line('Spam Report')
            ->line('Current Date: ' . $currentDate)
            ->line('Hello ' . $this->data['admin_name'])
            ->line('We have sent a spam notification to the doer: ' . $this->data['user']->name)
            ->line('The spam count for this user has reached: ' . $this->data['spamReportCount'])
            ->action('View Doer Profile', url('/' . $this->data['admin_name'] . '/dashboard'))
            ->line('Please take further action if necessary.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
