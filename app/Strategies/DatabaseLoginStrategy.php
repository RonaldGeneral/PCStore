<?php

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
        return back()->withErrors(['loginError' => 'Invalid credentials'])->withInput();
    }
}
