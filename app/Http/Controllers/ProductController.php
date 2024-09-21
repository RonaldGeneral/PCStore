<?php

 /**
  * @author Teh Chong Shin
  */

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\CategoryAttribute;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id','title', 'category', 'status', 'img_src1', 'price', 'total_rating')->get();
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
        $product->price = strip_tags($request->price);
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
        $attrs = CategoryAttribute::where('category', $product->category)
            ->pluck("name","id");
        $product_attrs = ProductAttribute::where('product_id', $product->id)
            ->pluck("value","attribute_id");

        return view('admin.pages.product-details', compact('product', 'attrs', 'product_attrs'));
    }

    public function edit_details($id, Request $request)
    {
        $product = Product::find($id);
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:65530',
            'price' => 'required|decimal:0,2|min:1|max:999999999',
            'img_src1' => 'nullable|file|image',
            'img_src2' => 'nullable|file|image',
            'img_src3' => 'nullable|file|image',
            'category' => 'required',
            'status' => 'required',
        ]);

        $product->title = strip_tags($request->title);
        $product->price = strip_tags($request->price);
        $product->description = strip_tags($request->description);
        $product->category = strip_tags($request->category);
        $product->status = strip_tags($request->status);
        $product->save();

        if ($request->hasFile('img_src1')) { 
            $extension = $request->file('img_src1')->extension();
            $img1 = $request->file('img_src1')->storePubliclyAs(path: '', name: $product->id . '_1.'. $extension, options: 'products');
            $product->img_src1 = $img1;
            $product->save();
        } 

        if ($request->hasFile('img_src2')) { 
            $extension = $request->file('img_src2')->extension();
            $img2 = $request->file('img_src2')->storePubliclyAs(path: '', name: $product->id . '_2.'. $extension, options: 'products');
            $product->img_src2 = $img2;
            $product->save();
        } 

        if ($request->hasFile('img_src3')) { 
            $extension = $request->file('img_src3')->extension();
            $img3 = $request->file('img_src3')->storePubliclyAs(path: '', name: $product->id . '_3.'. $extension, options: 'products');
            $product->img_src3 = $img3;
            $product->save();
        } 
        
        return redirect()->route('products.view', $id)
            ->with('success', 'Product edited successfully');
    }

    public function edit_attrs($product_id, Request $request)
    {
        $request->validate([
            'attribute_value' => 'required|max:255',
        ]);

        $attr = ProductAttribute::where('product_id', $product_id)
            ->where('attribute_id', $request->attr_id)
            ->first();
        
        if($attr)
            $attr->value = strip_tags($request->attribute_value);
        else {
            $attr = new ProductAttribute();
            $attr->product_id = $product_id;
            $attr->attribute_id = $request->attr_id;
            $attr->value = strip_tags($request->attribute_value);
        } 

        $attr->save();
        
        return redirect()->route('products.view', $product_id)
            ->with('success', 'Product edited successfully');
    }

    public function catalog(Request $request) {
        

        $products = Product::select(
            'id','title', 'category', 'status', 
            'img_src1', 'price', 'total_rating')
            ->where('status', '=', 1);
        
        $search = $request->input('search');
            
        $categories= $request->input('category', []);
        $price= $request->input('price');
        $order= $request->input('order', 'pa');
        
        if($search) {
            $products->whereLike('title', "%$search%");
        }
            
        if($categories && count($categories) > 0)
            $products->whereIn('category', $categories);

        switch($price) {
            case 1:
                //Under RM1000
                $products->where('price', '<', '1000');
                break;
            case 2:
                //RM 1000 - RM 2999
                $products->whereBetween('price', ['1000', '2999']);
                break;
            case 3:
                //RM 3000 - RM 4999
                $products->whereBetween('price', ['3000', '4999']);
                break;
            case 4:
                //RM 5000 - RM 6999
                $products->whereBetween('price', ['5000', '6999']);
                break;
            case 5:
                //Above RM7000
                $products->where('price', '>=', '7000');
                break;
        }
        
        switch($order) {
            
            case 'pd':
                $products->orderByDesc('price');
                break;
            case 'aa':
                $products->orderBy('title');
                break;
            case 'ad':
                $products->orderByDesc('title');
                break;
            case 'pa':
            default:
                $products->orderBy('price');
                break;
        }
        
        $products = $products->get();
        return view('front.pages.product-catalog', compact('products', 'categories', 'price', 'order'));
    }

    public function viewProduct($id) {

        $product = Product::find($id);
        $attrs = CategoryAttribute::where('category', $product->category)
            ->pluck("name","id");
        $product_attrs = ProductAttribute::where('product_id', $product->id)
            ->pluck("value","attribute_id");

        return view('front.pages.product-details', compact('product', 'attrs', 'product_attrs'));
    }


}