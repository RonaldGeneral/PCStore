<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.pages.product-page', compact('products'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:65530',
            'price' => 'required|decimal:0,2|min:1|max:999999999',
            'img_src1' => 'required',
            'category' => 'required',
        ]);

        // strip_tags()
        $product = new Product();
        $product->title = strip_tags($request->title);
        $product->price = $request->price;
        $product->description = strip_tags($request->description);
        $product->img_src1 = $request->img_src1;
        $product->category = strip_tags($request->category);
        $product->status = 2;

        $product->save();
    
        return redirect()->route('products.index');
    }

}
