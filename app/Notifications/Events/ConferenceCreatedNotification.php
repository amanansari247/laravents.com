<?php

namespace App\Notifications\Events;

use App\Models\Conference;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class ConferenceCreatedNotification extends Notification implements ShouldQueue
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
        return [TwitterChannel::class];
    }

    /**
     * @return TwitterStatusUpdate
     */
    public function toTwitter()
    {
        $item = $this->conference;
        $message = "New Conference: $item->title \n" . url('/c/' . $item->slug) ;
        return (new TwitterStatusUpdate($message));
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
