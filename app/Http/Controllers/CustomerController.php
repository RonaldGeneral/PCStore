<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view("front.pages.home");
    }

    public function profile()
    {
        return view("front.pages.profile");
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