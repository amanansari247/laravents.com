<?php

namespace App\Observers;

use App\Models\Hackathon;
use App\Models\User;
use App\Notifications\Admin\NewHackathonCreatedNotification;

class HackathonObserver
{
    /**
     * Listen to the User created event.
     *
     * @param Hackathon $item
     * @return void
     */
    public function created(Hackathon $item)
    {
        // Notify Admins
        $admins = User::whereIsAdmin(true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewHackathonCreatedNotification($item));
        }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param Hackathon $item
     * @return void
     */
    public function deleting(Hackathon $item)
    {
        //
    }
}
