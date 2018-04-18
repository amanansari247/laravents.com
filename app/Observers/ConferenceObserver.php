<?php

namespace App\Observers;

use App\Models\Conference;
use App\Notifications\Events\ConferenceCreatedNotification;

class ConferenceObserver
{
    /**
     * Listen to the User created event.
     *
     * @return void
     */
    public function created(Conference $item)
    {
        $item->notify(new ConferenceCreatedNotification($item));
    }

    /**
     * Listen to the User deleting event.
     *
     * @return void
     */
    public function deleting(Conference $item)
    {
        //
    }
}