<?php

namespace App\Notifications\RM;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeadAssignNotification extends Notification
{
    use Queueable;
    public $studentsUser;

    /**
     * Create a new notification instance.
     */
    public function __construct($studentsUser)
    {
        $this->user = $studentsUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->line('Hello,')
                ->line('You have received a new Notification for Assign Lead by ' . auth()->user()->name . '(' . auth()->user()->role . ') to you')
                ->line('Lead Name: ' . $this->user->name)
                ->line('Lead Email: ' . $this->user->email)
                ->action('View Lead', url('#'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name'=>auth()->user()->name,
            'email'=>auth()->user()->email,
            'phone'=>auth()->user()->phone,
            'role'=>auth()->user()->role,
            'lead_name'=>$this->user->name,
            'lead_email'=>$this->user->email,
            'action'=>"Lead Assign",
        ];
    }
}
