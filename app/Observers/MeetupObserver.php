<?php

namespace App\Observers;

use App\Models\Meetup;
use App\Models\User;
use App\Notifications\Admin\NewMeetupCreatedNotification;
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
        if ($item->is_approved) {
            $item->notify(new MeetupCreatedNotification($item));
        }

        // Notify Admins
        $admins = User::whereIsAdmin(true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewMeetupCreatedNotification($item));
        }
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
