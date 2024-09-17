<?php

namespace App\Strategies;

use App\Models\Customer;
use App\Strategies\LoginStrategy;
use Auth;

class ExternalLoginStrategy implements LoginStrategy
{
    public function login(array $credentials)
    {
        // Hardcoded external login logic, checking a .txt file or similar
        if ($credentials['email'] === 'external@example.com' && $credentials['password'] === 'password') {
            $user = Customer::where('email', $credentials['email'])->first();
            
            if (!$user) {
                // If no such user exists, you can create a temporary customer in your system
                $user = new Customer([
                    'name' => 'External User',
                    'email' => $credentials['email'],
                    // You can fill other fields as necessary
                ]);
                $user->save();
            }

            Auth::guard('customer')->login($user);

            return redirect()->route('front.home');
        }
        return back()->withErrors(['loginError' => 'Invalid external login credentials.']);
    }
}
