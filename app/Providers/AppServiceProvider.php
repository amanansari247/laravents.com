<?php

namespace App\Providers;

use App\Models\Conference;
use App\Models\Hackathon;
use App\Models\Meetup;
use App\Models\User;
use App\Observers\ConferenceObserver;
use App\Observers\HackathonObserver;
use App\Observers\MeetupObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);

        Meetup::observe(MeetupObserver::class);
        Hackathon::observe(HackathonObserver::class);
        Conference::observe(ConferenceObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
