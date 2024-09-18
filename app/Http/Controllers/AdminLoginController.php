<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view("admin.pages.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:8',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route("admin.profile"));
        }

        return back()->withErrors([
            'loginError' => 'Invalid username or password!'
        ])->withInput();
    }
}
