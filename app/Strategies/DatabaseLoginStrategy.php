<?php

/**
  * @author Leong Wai Loc
  */

namespace App\Strategies;

use App\Strategies\LoginStrategy;
use Illuminate\Support\Facades\Auth;

class DatabaseLoginStrategy implements LoginStrategy
{
    public function login(array $credentials)
    {
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('front.home');
        }
        return back()->with('loginError', 'Invalid credentials.')->withInput();
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect()->route('front.home');
    }
}
