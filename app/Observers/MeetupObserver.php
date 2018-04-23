<?php

namespace App\Observers;

use App\Models\Meetup;
use App\Models\User;
use App\Notifications\Admin\NewMeetupCreatedNotification;

class MeetupObserver
{
    /**
     * Listen to the User created event.
     *
     * @param Meetup $item
     * @return void
     */
    public function created(Meetup $item)
    {
        // Notify Admins
        $admins = User::whereIsAdmin(true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewMeetupCreatedNotification($item));
        }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param Meetup $item
     * @return void
     */
    public function deleting(Meetup $item)
    {
        //
    }
}
