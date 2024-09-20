<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

    public function deleteCart(Request $request) {
        $customer = Auth::guard('customer')->user();

        if($request->product_id) {
            $cart = CartItem::where('customer_id','=',$customer->id)
                ->where('product_id','=',$request->product_id);
            $cart->delete();
        }

        return redirect()->route('front.cart');
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
        if(count($items) <= 0)
            return redirect()->route('front.cart');

        $subtotal = $items->sum('subtotal');
        $delivery_fee = 3;
        $total = $subtotal + $delivery_fee;
        

        return view('front.pages.checkout-summary', compact('customer', 'delivery_fee', 'subtotal', 'total'));
    }

    public function  create(Request $request, $payment) {       

        $customer = Auth::guard('customer')->user();
        $items = CartItem::where('customer_id', '=', $customer->id)->get();
        if(count($items) <= 0)
            return redirect()->route('front.cart');

        $subtotal = $items->sum('subtotal');
        $delivery_fee = 3;
        $total = $subtotal + $delivery_fee;

        $payment = Payment::find($payment);
        $payment->status = 1;
        $response = Http::accept('application/json')->get('http://localhost:5200/payment/get', [
            'id'=>$payment->token
        ]);

        $res = $response->json();
        
        $payment->save();
        $order = new Order();
        $order->payment_id = $payment->id;
        $order->customer_id = $customer->id;
        $order->status = 1;
        $order->delivery_fee = $delivery_fee;
        $order->subtotal = $subtotal;
        $order->total = $total;
        $order->save();

        foreach($items as $item) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $item->product_id;
            $order_item->quantity = $item->quantity;
            $order_item->price = $item->price;
            $order_item->subtotal = $item->subtotal;
            $order_item->save();

            $item->forceDelete();
        }
        
/*
        :XML Code 
*/
        $xml = new \DOMDocument();
        $xml->loadXML($res['data']);

        $xsl = new \DOMDocument();
        $xsl->substituteEntities = TRUE;
        $xsl->load(Storage::disk('xslt')->path('payment.xsl'));

        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->importStylesheet($xsl);

        $payment_html = $xsltProcessor->transformToXML($xml);

        return view('front.pages.payment', compact('order', 'payment_html'));
    }

    public function makePayment(Request $request) {
        
        $request->validate([
            'payment' => 'required',
        ]);

        $customer = Auth::guard('customer')->user();
        $items = CartItem::where('customer_id', '=', $customer->id)->get();
        if(count($items) <= 0)
            return redirect()->route('front.cart');

        $subtotal = $items->sum('subtotal');
        $delivery_fee = $request->input('delivery');
        $total = $subtotal + $delivery_fee;
        
        $payment_method = $request->input('payment');

        $payment = new Payment();
        $payment->payment_method = $payment_method;
        $payment->status = 0;
        $payment->save();
        
        $response = Http::post('http://localhost:5200/payment', [
            'total' => $total,
            'method' => $payment_method,
            'post_link' => route('order.updatePayment', $payment->id),
            'redirect_link' => route('order.create',$payment->id),
        ]);

        $res = $response->json();
        return redirect($res['url']);

    }

    public function updatePayment(Request $request, $payment){
        $method = $request->input('method');

        $payment = Payment::find($payment);
        switch($method) {
            case 'tng':
                $payment->tng_number = $request->input('tng_number');
                break;
            case 'fpx':
                $payment->fpx_bank_name = $request->input('fpx_bank_name');
                $payment->card_number = $request->input('card_number');
                break;
            case 'card':
                $payment->card_number = $request->input('card_number');
                break;
        }
        $payment->token = $request->input('token');

        $payment->save();
        return response()->json([
            'data' => $payment
        ]);
    }

    public function showPayment(Request $request) {
        $customer = Auth::guard('customer')->user();
        
        

        return view('front.pages.payment', compact('customer', 'items'));
    }

    public function testxml() {
        $xml = new \DOMDocument();
        $xml->loadXML(Storage::disk('xslt')->path('test.xml'));

        // Load the XSLT stylesheet
        $xsl = new \DOMDocument();
        $xsl->substituteEntities = TRUE;
        $xsl->load(Storage::disk('xslt')->path('payment.xsl'));

        // Create the XSLTProcessor object
        $xsltProcessor = new XSLTProcessor();

        // Load the XSLT stylesheet into the XSLTProcessor object
        $xsltProcessor->importStylesheet($xsl);

        // Apply the XSLT transformation to the XML document
        $html = $xsltProcessor->transformToXML($xml);

        echo $html;
    }
}
