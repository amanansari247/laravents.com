<?php

namespace App\Notifications\Events;

use App\Models\Meetup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class MeetupCreatedNotification extends Notification implements ShouldQueue
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
        return [TwitterChannel::class];
    }

    /**
     * @return TwitterStatusUpdate
     */
    public function toTwitter()
    {
        $item = $this->meetup;
        $message = "New Meetup: $item->title \n" . url('/m/' . $item->slug) ;
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
