<?php

namespace App\Configuration;

class Laravents
{
    public static function scriptVariables()
    {
        return [
            'algoliaAppID' => env('ALGOLIA_APP_ID'),
            'algoliaSearchOnlyKey' => env('ALGOLIA_SEARCH_ONLY_KEY'),
        ];
    }
}
