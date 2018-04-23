<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\Admin\NewUserSignedUpNotification;
use App\Notifications\Users\WelcomeNotification;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->notify(new WelcomeNotification($user));

        // Notify Admins
        $admins = User::whereIsAdmin(true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewUserSignedUpNotification($user));
        }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}
