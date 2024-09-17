<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Strategies\DatabaseLoginStrategy;
use App\Strategies\ExternalLoginStrategy;
use App\Strategies\LoginContext;


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
        if (!session('access_reset_password', false)) {
            return redirect()->route('front.forgot_pw')->withErrors(['error' => 'Unauthorized access.']);
        }
    
        session()->forget('access_reset_password');
        
        return view("front.pages.new-password");
    }

    //LOGIC
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:8',
        ]);



        if($request->input('loginType') === 'external'){
            $context = new LoginContext(new ExternalLoginStrategy());
        } else {
            $context = new LoginContext(new DatabaseLoginStrategy());
        }

        return $context->executeLogin($credentials);

        // if (Auth::guard('customer')->attempt($credentials)) {
        //     return redirect()->route("front.home");
        // }

        // return back()->withErrors(['loginError' => 'Invalid username or password!'])->withInput();
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('front.home');
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

        return redirect()->route('front.login')->with('success', 'Account created successfully!');
    }

    public function resetPassword(Request $request)
    {
        $user = Auth::guard('customer')->user();
        $email = $user->email;

        $pin = random_int(100000, 999999);

        session([
            'reset_pin' => $pin,
            'pin_generated_at' => Carbon::now(),
        ]);

        try {
            $response = $this->sendEmailFromApi($email, $pin);

            if ($response->successful()) {
                return response()->json(['success' => true, 'message' => 'PIN sent to your email address. Please enter the PIN within 10 minutes.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to send email. Please try again later.']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function sendEmailFromApi($email, $pin)
    {
        $data = [
            'receiver' => $email,
            'subject' => 'Your Password Reset PIN',
            'message' => 'Your password reset PIN is <b>' . $pin . "</b>. This PIN is valid for 10 minutes. <br /><br />TerraByte Malaysia",
        ];

        return Http::post('http://localhost:5002/api/emailservice/send', $data);
    }

    public function verifyPIN(Request $request)
    {
        $validatedData = $request->validate([
            'pin' => 'required|integer',
        ]);

        $storedPin = session('reset_pin');
        $pinGeneratedAt = session('pin_generated_at');

        //dd($pinGeneratedAt->diffInMinutes(Carbon::now()), Carbon::now()->diffInMinutes($pinGeneratedAt), $storedPin === $validatedData['pin']);
        if ((string) $storedPin === (string) $validatedData['pin'] && $pinGeneratedAt->diffInMinutes(Carbon::now()) <= 10) {
            session(['access_reset_password' => true]);

            return redirect()->route('front.new_pw');
        }

        return redirect()->route('front.forgot_pw')->withErrors(['error' => 'The PIN is invalid or has expired.']);
    }

    public function changePassword(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        $validatedData = $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $customer->password = Hash::make($validatedData['password']);
        $customer->save();

        return redirect()->route('front.login')->with('success', 'Password changed successfully!');
    }
}