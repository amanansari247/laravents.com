<?php

namespace App\Notifications\Admin;

use App\Models\Conference;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewConferenceCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Conference
     */
    public $conference;

    /**
     * Create a new notification instance.
     *
     * @param Conference $conference
     */
    public function __construct(Conference $conference)
    {

        $this->conference = $conference;
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
        $url = url('/c/') . $this->conference->slug;
        return (new MailMessage)
                    ->line('A new conference was just created:')
                    ->line('Title: ' . $this->conference->title)
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
