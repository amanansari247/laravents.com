<?php

Route::apiResource('users', 'Api\Users\UserController');
Route::apiResource('users.notifications', 'Api\Users\NotificationController');

Route::apiResource('conferences', 'Api\Events\ConferenceController');
Route::apiResource('meetups', 'Api\Events\MeetupController');
Route::apiResource('hackathons', 'Api\Events\HackathonController');