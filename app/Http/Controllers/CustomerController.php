<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index()
    {
        return view("front.pages.home");
    }

    public function profile()
    {
        $customer = Auth::guard('customer')->user();

        if ($customer->dob != null) {
            $formattedDob = Carbon::parse($customer->dob)->format('Y-m-d');
        } else {
            $formattedDob = '';
        }

        return view("front.pages.profile", compact('customer', 'formattedDob'));
    }

    public function deliveryStatus()
    {
        return view("front.pages.delivery-status");
    }

    public function orderHistory(Request $request)
    {
        $status = $request->query('status');

        $customer = Auth::guard('customer')->user();

        $customerOrders = Order::where('customer_id', Auth::guard('customer')->id())
            ->where('status', '!=', -1)
            ->get();


        if (!is_null($status)) {
            $customerOrders = $customerOrders->filter(function ($order) use ($status) {
                return $order->status == $status;
            });
        }

        return view("front.pages.order-history", compact("customer", "customerOrders", "status"));
    }


    public function updateProfile(Request $request)
    {
        if ($request->input("password") == null) {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'name' => 'required|string',
                'phone' => 'required',
                'gender' => 'required',
                'birthdate' => 'required',
                'address' => 'required|string',
                'state' => 'required|string',
                'postcode' => 'required|string',
                'city' => 'required|string',
            ]);
        } else {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'name' => 'required|string',
                'phone' => 'required',
                'gender' => 'required',
                'birthdate' => 'required',
                'address' => 'required|string',
                'state' => 'required|string',
                'postcode' => 'required|string',
                'city' => 'required|string',
                'password' => 'required|min:8|confirmed'
            ]);
        }

        $customer = Auth::guard('customer')->user();
        $customer->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updateProfileCheckout(Request $request)
    {
        $cust = Auth::guard('customer')->user();

        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'phone' => 'required',
            'address' => 'required|string',
            'state' => 'required|string',
            'postcode' => 'required|string',
            'city' => 'required|string',
        ]);

        $customer = Auth::guard('customer')->user();
        $customer->update($validatedData);

        return redirect()->route('order.checkout');
    }
}