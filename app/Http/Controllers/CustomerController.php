<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        return view("front.pages.home");
    }

    public function profile()
    {
        $customer = Auth::guard('customer')->user();

        return view("front.pages.profile", compact('customer'));
    }

    public function deliveryStatus()
    {
        return view("front.pages.delivery-status");
    }

    public function orderHistory()
    {
        return view("front.pages.order-history");
    }
}