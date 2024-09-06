<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::select('id','title', 'category', 'status', 'img_src1', 'price', 'total_rating')->get();
        return view('admin.pages.product-page', compact('products'));
    }
}
