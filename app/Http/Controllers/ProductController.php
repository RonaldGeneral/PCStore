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

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orWhere('id', 'like', "%$query%")
            ->get();
        return view('admin.pages.product-page', compact('products', 'query'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:65530',
            'price' => 'required|decimal:0,2|min:1|max:999999999',
            'img_src1' => 'required|file|image',
            'category' => 'required',
        ]);

        $product = new Product();
        $product->title = strip_tags($request->title);
        $product->price = $request->price;
        $product->description = strip_tags($request->description);
        $product->category = strip_tags($request->category);
        $product->status = 2;

        $product->save();

        if ($request->hasFile('img_src1')) { 
            $extension = $request->file('img_src1')->extension();
            $img1 = $request->file('img_src1')->storePubliclyAs(path: '', name: $product->id . '_1.'. $extension, options: 'products');
        } 
        
        $product->img_src1 = $img1;
        $product->save();
    
        return redirect()->route('products.index');
    }

    public function destroy(Request $request)
    {
        $id= $request->delete_id;
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function view($id)
    {
        $product = Product::find($id);
        return view('admin.pages.product-details', compact('product'));
    }

}
