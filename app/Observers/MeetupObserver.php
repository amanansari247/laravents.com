<?php

namespace App\Observers;

use App\Models\Meetup;
use App\Notifications\Events\MeetupCreatedNotification;

class MeetupObserver
{
    /**
     * Listen to the User created event.
     *
     * @return void
     */
    public function created(Meetup $item)
    {
        $item->notify(new MeetupCreatedNotification($item));
    }

    /**
     * Listen to the User deleting event.
     *
     * @return void
     */
    public function deleting(Meetup $item)
    {
        //
    }
}
