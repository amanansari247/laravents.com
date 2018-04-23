<?php

namespace App\Observers;

use App\Models\Conference;
use App\Models\User;
use App\Notifications\Admin\NewConferenceCreatedNotification;
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
        if ($item->is_approved) {
            $item->notify(new ConferenceCreatedNotification($item));
        }

        // Notify Admins
        $admins = User::whereIsAdmin(true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewConferenceCreatedNotification($item));
        }
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
