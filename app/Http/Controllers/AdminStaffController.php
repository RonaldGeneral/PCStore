<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminStaffController extends Controller
{
    public function index()
    {
        $admins = Admin::select('id', 'name', 'birthdate', 'phone', 'email', 'gender', 'username', 'password', 'status', 'created_on', 'position_id')->get();
        
        return view('admin.pages.staff-page', compact('admins'));
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        //$formattedDob = Carbon::parse($admin->dob)->format('Y-m-d');

        return view("admin.pages.profile", compact('admin'));
    }

    public function reports()
    {
        // Fetch sales by category
        $salesByCategory = DB::table('order_item')
            ->join('product', 'order_item.product_id', '=', 'product.id')
            ->select(DB::raw('SUM(order_item.subtotal) as total_sales, product.category'))
            ->groupBy('product.category')
            ->get();

        // Fetch sales data for the last 3 months
        $startDate = Carbon::now()->subMonths(3);
        $salesData = DB::table('order')
            ->select(DB::raw('SUM(total) as total_sales, DATE(created_on) as date'))
            ->where('created_on', '>=', $startDate)
            ->groupBy('date')
            ->get();


        return view('admin.pages.report-page', [
            'salesByCategory' => $salesByCategory,
            'salesData' => $salesData,
            "orders" => null
        ]);
    }

    public function filterOrdersForReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $orders = Order::whereBetween('created_on', [$startDate, $endDate])->get();

        $totalSubtotal = $orders->sum('subtotal');

        return view('admin.pages.report-page', compact('orders', 'totalSubtotal'));
    }

    public function salesByCategory()
    {
        $salesByCategory = DB::table('order_items')
            ->join('categories', 'order_items.category_id', '=', 'categories.id')
            ->select(DB::raw('SUM(order_items.subtotal) as total_sales, categories.name'))
            ->groupBy('categories.name')
            ->get();

        return view('report', compact('salesByCategory'));
    }



    public function create(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',
            'birthdate' => 'required|date_format:D-M-Y|before:today',
            'phone' => 'required|digits:12',
            'email' => 'required|email|unique:admin,email',
            'gender' => 'required',
            'username' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
            'position_id' => 'required',
        ]);

        $admin = new Admin();
        $admin->name = strip_tags($request->name);
        $admin->birthdate = strip_tags($request->birthdate);
        $admin->phone = strip_tags($request->phone);
        $admin->email = strip_tags($request->email);
        $admin->gender = strip_tags($request->gender);
        $admin->username = strip_tags($request->username);
        $admin->password = strip_tags($request->password);
        $admin->status = 2;
        $admin->position_id = strip_tags($request->position_id);


        $admin->save();



        return redirect()->route('admins.index');
    }

    public function destroy(Request $request)
    {
        $id = $request->delete_id;
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admins.index')
            ->with('success', 'Admin deleted successfully');
    }

    public function view($id)
    {
        $admin = Admin::find($id);

        return view('admin.pages.staff-details', compact('admin'));
    }

    public function viewLog($id)
    {


        return view('admin.pages.log-record', compact('admin'));
    }

    public function edit_details($id, Request $request)
    {
        $admin = Admin::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date_format:D-M-Y|before:today',
            'phone' => 'required|digits:12',
            'email' => 'required|email|unique:admin,email',
            'gender' => 'required',
            'username' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
            'position_id' => 'required',
            'status' => 'required',
        ]);

        $admin->name = strip_tags($request->name);
        $admin->birthdate = strip_tags($request->birthdate);
        $admin->phone = strip_tags($request->phone);
        $admin->email = strip_tags($request->email);
        $admin->gender = strip_tags($request->gender);
        $admin->username = strip_tags($request->username);
        $admin->password = strip_tags($request->password);
        $admin->status = strip_tags($request->status);
        $admin->position_id = strip_tags($request->position_id);
        $admin->save();



        return redirect()->route('admins.view', $id)
            ->with('success', 'Admin details edited successfully');
    }
}
