<?php

/**
  * @author Leong Wai Loc
  */

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return view("front.pages.home");
    }

    public function profile()
    {
        $customer = Auth::guard('customer')->user();

        if ($customer->birthdate != null) {
            $formattedDob = Carbon::parse($customer->birthdate)->format('Y-m-d');
        } else {
            $formattedDob = '';
        }

        return view("front.pages.profile", compact('customer', 'formattedDob'));
    }

    public function deliveryStatus($id)
    {

        $customer = Auth::guard('customer')->user();
        $order = Order::where('customer_id', '=', $customer->id)
            ->whereNot('status', -1)
            ->find($id);

        if (!$order)
            return redirect()->route('front.home');

        return view("front.pages.delivery-status", compact('order'));
    }

    public function orderHistory(Request $request)
    {
        $status = $request->query('status');

        $customer = Auth::guard('customer')->user();

        $customerOrders = Order::where('customer_id', Auth::guard('customer')->id())
            ->where('status', '!=', -1)->orderBy('created_on', 'desc')
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
            $validatedData['password'] = Hash::make($validatedData['password']);
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

    public function reviewOrderItems(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:order,id',
            'reviews.*.rating' => 'required|integer|min:1|max:5',
        ]);

        foreach ($validatedData['reviews'] as $productId => $reviewData) {
            OrderItem::where('product_id', $productId)
                ->where('order_id', $validatedData['order_id'])
                ->update(['rating' => $reviewData['rating'],]);
        }

        // Redirect or return response
        return redirect()->back()->with('success', 'Reviews saved successfully!');
    }
}