<?php

namespace App\Observers;

use App\Models\Conference;
use App\Models\User;
use App\Notifications\Admin\NewConferenceCreatedNotification;

class ConferenceObserver
{
    /**
     * Listen to the User created event.
     *
     * @param Conference $item
     * @return void
     */
    public function created(Conference $item)
    {
        // Notify Admins
        $admins = User::whereIsAdmin(true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewConferenceCreatedNotification($item));
        }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param Conference $item
     * @return void
     */
    public function deleting(Conference $item)
    {
        //
    }
}
