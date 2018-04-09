<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/auth/social/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('/auth/social/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
