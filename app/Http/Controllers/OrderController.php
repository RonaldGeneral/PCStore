<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use XSLTProcessor;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::whereNot('status', -1)->paginate(15);
        return view('admin.pages.order-page', compact('orders'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $status = $request->input('status');

        $orders = Order::whereNot('status', -1)
            ->where('status', 'like', "%$status%")
            ->whereHas('customer', function ($customerQuery) use ($query) {
                $customerQuery->where('name', 'like', "%$query%");
            })
            ->paginate(15);
        return view('admin.pages.order-page', compact('orders', 'query', 'status'));
    }

    public function view($id)
    {
        $order = Order::find($id);
        if($order->status == -1) 
            return redirect()->route('orders.index');

        return view('admin.pages.order-details', compact('order'));
    }

    public function destroy(Request $request)
    {
        $id= $request->delete_id;
        $order = Order::find($id);
        $order->status = -1;
        $order->save();
        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }

    public function addToCart(Request $request) {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:255',
        ]);

        $customer = Auth::guard('customer')->user();
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $submit = $request->input('submit');
        $product = Product::find($id);

        $new_cart = CartItem::where('customer_id', '=', $customer->id)
            ->where('product_id', '=', $id)
            ->first();

        if($new_cart) {
            $new_cart->quantity += $quantity;
            $new_cart->price = $product->price;
            $new_cart->subtotal = $product->price * $new_cart->quantity;
        } else {
            $new_cart = new CartItem();
            $new_cart->customer_id = $customer->id;
            $new_cart->product_id = $id;
            $new_cart->quantity = $quantity;
            $new_cart->price = $product->price;
            $new_cart->subtotal = $product->price * $quantity;
        }
        
        $new_cart->save();
        
        if($submit == 'buy')
            return redirect()->route('front.cart');

        return redirect()->route('front.viewProduct', $id);
    }

    public function showCart() {
        $customer = Auth::guard('customer')->user();
        $items = CartItem::where('customer_id', '=', $customer->id)->get();
        $subtotal = $items->sum('subtotal');

        return view('front.pages.cart', compact('items', 'subtotal'));
    }

    public function viewCheckout() {
        $cust = Auth::guard('customer')->user();
        $customer = [
            'name'=>$cust->name,
            'phone'=>$cust->phone,
            'email'=>$cust->email,
            'address'=>$cust->address,
            'postcode'=>$cust->postcode,
            'state'=>$cust->state,
            'city'=>$cust->city,
        ];
        
        return view('front.pages.checkout', compact('customer'));
    }

    public function checkout(Request $request) {
        $cust = Auth::guard('customer')->user();
        $customer = [
            'name'=>$cust->name,
            'phone'=>$cust->phone,
            'email'=>$cust->email,
            'address'=>$cust->address,
            'postcode'=>$cust->postcode,
            'state'=>$cust->state,
            'city'=>$cust->city,
        ];

        $items = CartItem::where('customer_id', '=', $cust->id)->get();
        $subtotal = $items->sum('subtotal');
        $delivery_fee = 3;
        $total = $subtotal + $delivery_fee;
        

        return view('front.pages.checkout-summary', compact('customer', 'delivery_fee', 'subtotal', 'total'));
    }

    public function payment(Request $request) {
        $customer = Auth::guard('customer')->user();
        $items = CartItem::where('customer_id', '=', $customer->id)->get();
        

        return view('front.pages.payment', compact('customer', 'items'));
    }
}
