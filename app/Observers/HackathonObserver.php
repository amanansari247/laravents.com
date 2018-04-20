<?php

namespace App\Observers;

use App\Models\Hackathon;
use App\Notifications\Events\HackathonCreatedNotification;

class HackathonObserver
{
    /**
     * Listen to the User created event.
     *
     * @return void
     */
    public function created(Hackathon $item)
    {
        $item->notify(new HackathonCreatedNotification($item));
    }

    /**
     * Listen to the User deleting event.
     *
     * @return void
     */
    public function deleting(Hackathon $item)
    {
        //
    }
}
