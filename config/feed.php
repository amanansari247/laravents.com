<?php

return [

    'feeds' => [
        'conferences' => [
            'items' => 'App\Models\Conference@getFeedItems',
            'url' => '/feed/conferences',
            'title' => 'Recent Conferences',
        ],

        'meetups' => [
            'items' => 'App\Models\Meetup@getFeedItems',
            'url' => '/feed/meetups',
            'title' => 'Recent Meetups',
        ],

        'hackathons' => [
            'items' => 'App\Models\Hackathon@getFeedItems',
            'url' => '/feed/hackathons',
            'title' => 'Recent Hackathons',
        ],
    ],

];
