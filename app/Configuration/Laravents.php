<?php

namespace App\Configuration;

use Illuminate\Support\Facades\Auth;

class Laravents
{
    public static function scriptVariables()
    {
        return [
            'algoliaAppID' => env('ALGOLIA_APP_ID'),
            'algoliaSearchOnlyKey' => env('ALGOLIA_SEARCH_ONLY_KEY'),
            'currentUser' => Auth::user(),
            'gmaps_key' => env('GMAPS_KEY'),
            'ga_key' => env('GA_KEY')
        ];
    }
}
