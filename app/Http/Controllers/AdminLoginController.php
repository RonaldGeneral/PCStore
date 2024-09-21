<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        
        return view("admin.pages.login");
    }

    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required | min:8',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route("admin.profile"));
        }
        
        return back()->withErrors([
            'loginError' => 'Invalid username or password!'
        ])->withInput();
    }

    public function logout()
    {
        $user = Auth::guard('admin')->user();

        return $context->executeLogout();
    }
}
