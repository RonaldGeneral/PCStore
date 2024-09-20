<?php

namespace App\Strategies;

use Hash;
use Auth;
use App\Models\Customer;
use App\Strategies\LoginStrategy;

class ExternalLoginStrategy implements LoginStrategy
{
    public function login(array $credentials)
    {
        $userInput = $credentials['email'] . ", " . $credentials['password'];
        $filePath = base_path('resources/logins/externalAuth.txt');

        $file = fopen($filePath, 'r');
        $authenticated = false;

        if ($file) {
            while (($line = fgets($file)) !== false) {
                $line = trim($line, " \t\n\r\0\x0B,");

                if ($userInput === $line) {
                    $authenticated = true;
                    break;
                }
            }

            fclose($file);

            if ($authenticated) {
                $customer = Customer::where('email', $credentials['email'])->first();

                if (!$customer) {
                    //If no such user exists, create a temp customer 
                    $customer = new Customer([
                        'name' => 'External User',
                        'email' => $credentials['email'],
                        'username' => 'externaluser',
                        'phone' => '',
                        'password' => Hash::make($credentials['password'])
                    ]);
                    $customer->status = 2; //assuming 2 is external account
                    $customer->save();
                }

                Auth::guard('customer')->login($customer);

                return redirect()->route('front.home');

            } else {
                return back()->with('loginError', 'Invalid external login credentials.')->withInput();

            }
        }
    }

    public function logout(){
        $user = Auth::guard('customer')->user();
        Auth::guard('customer')->logout();
        
        if ($user->status == 2) {
            $user->delete();
        }

        return redirect()->route('front.home');
    }
}
