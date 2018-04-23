<?php

namespace App\Observers;

use App\Models\Hackathon;
use App\Models\User;
use App\Notifications\Admin\NewHackathonCreatedNotification;
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
        if ($item->is_approved) {
            $item->notify(new HackathonCreatedNotification($item));
        }

        // Notify Admins
        $admins = User::whereIsAdmin(true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewHackathonCreatedNotification($item));
        }
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
