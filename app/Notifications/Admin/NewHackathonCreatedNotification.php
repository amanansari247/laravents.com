<?php

namespace App\Notifications\Admin;

use App\Models\Hackathon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewHackathonCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Hackathon
     */
    public $hackathon;

    /**
     * Create a new notification instance.
     *
     * @param Hackathon $hackathon
     */
    public function __construct(Hackathon $hackathon)
    {
        $this->hackathon = $hackathon;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/h/') . $this->hackathon->slug;
        return (new MailMessage)
            ->line('A new hackathon was just created:')
            ->line('Title: ' . $this->hackathon->title)
            ->action('Show new event', $url)
            ->line('Thank you for using ' . env('APP_NAME') . '!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
