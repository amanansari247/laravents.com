<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/auth/social/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('/auth/social/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('c', 'Events\ConferenceController');

Route::get('/test', function () {
    $event = (new App\Models\Conference)->first();
    $event->notify(new \App\Notifications\Events\ConferenceCreatedNotification($event));
});
