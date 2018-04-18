<?php

namespace App\Notifications\Events;

use App\Models\Hackathon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class HackathonCreatedNotification extends Notification implements ShouldQueue
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
        return [TwitterChannel::class];
    }

    /**
     * @return TwitterStatusUpdate
     */
    public function toTwitter()
    {
        $item = $this->hackathon;
        $message = "New Hackathon: $item->title \n" . url('/h/' . $item->slug) ;
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
