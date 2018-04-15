<?php

Route::domain('tickets.laravents.com')->group(function() {
    Route::get('/', 'Tickets\TicketController@index');

    Route::get('/123', function() {
        return 'Hello from tickets.laravents.com!';
    });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/auth/social/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('/auth/social/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('events', 'Events\EventController');
Route::resource('c', 'Events\ConferenceController');
Route::resource('m', 'Events\MeetupController');
Route::resource('h', 'Events\HackathonController');

Route::get('/test', function () {
    $event = (new App\Models\Conference)->first();
    $event->notify(new \App\Notifications\Events\ConferenceCreatedNotification($event));
});

