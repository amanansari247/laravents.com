<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function getAccount()
    {
        return view('account.profile.index');
    }
}
