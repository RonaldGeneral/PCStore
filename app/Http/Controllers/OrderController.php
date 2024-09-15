<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

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

}
