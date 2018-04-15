<?php

Route::apiResource('conferences', 'Api\Events\ConferenceController');
Route::apiResource('users', 'Api\Users\UserController');
Route::apiResource('users.notifications', 'Api\Users\NotificationController');
