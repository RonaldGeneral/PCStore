<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustLoginController extends Controller
{

    //VIEWS
    public function index()
    {
        return view("front.pages.login");
    }

    public function signUp()
    {
        return view("front.pages.signup");
    }

    public function forgotPassword()
    {
        return view("front.pages.forgot-password");
    }

    public function newPassword()
    {
        return view("front.pages.new-password");
    }

    //LOGIC
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:8',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route("front.home"));
        }

        return back()->withErrors([
            'loginError' => 'Invalid username or password!'
        ])->withInput();
    }

    public function createAccount(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');
        $username = $request->input('username');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customer,email',
            'password' => 'required|min:8|confirmed',
            'username' => 'required|string|max:255',
        ]);

        $customer = new Customer();
        $customer->email = $email;
        $customer->name = $name;
        $customer->username = $username;
        $customer->password = Hash::make($password);
        $customer->phone = "";
        $customer->status = 1; //assuming 1 is active
        $customer->save();

        return redirect()->route('front.login');
    }
}