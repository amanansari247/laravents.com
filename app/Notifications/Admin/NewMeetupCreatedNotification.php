<?php

namespace App\Notifications\Admin;

use App\Models\Meetup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMeetupCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Meetup
     */
    public $meetup;

    /**
     * Create a new notification instance.
     *
     * @param Meetup $meetup
     */
    public function __construct(Meetup $meetup)
    {
        $this->meetup = $meetup;
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
        $url = url('/m/') . $this->meetup->slug;
        return (new MailMessage)
            ->line('A new meetup was just created:')
            ->line('Title: ' . $this->meetup->title)
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
