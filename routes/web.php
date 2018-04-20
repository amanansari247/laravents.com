<?php

Route::domain('tickets.laravents.test')->group(function () {
    Route::get('/', 'Tickets\TicketController@index');
});

Route::domain('tickets.laravents.com')->group(function () {
    Route::get('/', 'Tickets\TicketController@index');
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

Route::group(['prefix' => 'account', 'middleware' => 'auth'], function () {
    Route::get('/', 'Account\AccountController@getAccount');
    Route::get('/settings', 'Account\SettingsController@getSettings');
});

Route::view('/imprint', 'static.imprint');
Route::view('/privacy', 'static.privacy');

Route::feeds();
