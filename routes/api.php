<?php

Route::apiResource('users', 'Api\Users\UserController');
Route::apiResource('users.notifications', 'Api\Users\NotificationController');

Route::apiResource('conferences', 'Api\Events\ConferenceController');
Route::apiResource('meetups', 'Api\Events\MeetupController');
Route::apiResource('hackathons', 'Api\Events\HackathonController');

Route::post('/conferences/{id}/publish', 'Api\Events\ConferenceController@togglePublished');
Route::post('/meetups/{id}/publish', 'Api\Events\MeetupController@togglePublished');
Route::post('/hackathons/{id}/publish', 'Api\Events\HackathonController@togglePublished');
