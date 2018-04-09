<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        return Socialite::with($provider)
            ->redirect();
    }

    /**
     * @param SocialAccountService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));

        auth()->login($user);

        return redirect()->to('/home');
    }
}
