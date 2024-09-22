<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminCustomerController extends Controller
{
    
    public function index()
    {
        $customers = Customer::select('id','name', 'birthdate', 'phone', 'email', 'gender', 'address', 'postcode', 'city', 'state', 'username', 'password', 'status', 'created_on')->get();
        return view('admin.pages.customer-page', compact('customers'));
    }

    public function create(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            'birthdate' => 'required|before:today',
            'phone' => 'required|digits:12',
            'email' => 'required|email|unique:customer,email',
            'gender' => 'required',
            'address' => 'required|max:500',
            'postcode' => 'required|max:20',
            'city' => 'required|max:500',
            'state' => 'required|max:500',
            'username' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
            
            
        ]);

        $customer = new Customer();
        $customer->name = strip_tags($request->name);
        $customer->birthdate = strip_tags($request->birthdate);
        $customer->phone = strip_tags($request->phone);
        $customer->email = strip_tags($request->email);
        $customer->gender = strip_tags($request->gender);
        $customer->address = strip_tags($request->address);
        $customer->postcode = strip_tags($request->postcode);
        $customer->city = strip_tags($request->city);
        $customer->state = strip_tags($request->state);
        $customer->username = strip_tags($request->username);
        $customer->password = Hash::make($request->password);
        $customer->status = strip_tags($request->status);  

        $customer->save();

        LogActivityController::logActivity(
            'Add customer', 'Customer '.$customer->name." #". $customer->id ." added", 'customer_page');
    
        return redirect()->route('customers.index');
    }

    public function destroy(Request $request)
    {
        $id= $request->delete_id;
        $customer = Customer::find($id);

        LogActivityController::logActivity(
            'Delete customer', 'Customer '.$customer->name." #". $customer->id ." deleted", 'customer_page');
        $customer->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully');
    }

    public function view($id)
    {
        $customer = Customer::find($id);

        
        $orders = Order::where('customer_id', '=', $id)
                ->whereNot('status', -1)
                ->orderByDesc('created_on')
                ->get();
        
        return view('admin.pages.customer-details', compact('customer', 'orders'));
    }

    public function edit_details($id, Request $request)
    {
        $customer = Customer::find($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'before:today',
            'phone' => 'digits:12',
            'email' => 'email|unique:customer,email',
            'gender' => 'required',
            'address' => 'max:500',
            'postcode' => 'max:20',
            'city' => 'max:500',
            'state' => 'max:500',
            'username' => 'string|max:255',
            'status' => 'required',
        ]);
        
        $customer->name = strip_tags($request->name);
        $customer->birthdate = strip_tags($request->birthdate);
        $customer->phone = strip_tags($request->phone);
        $customer->email = strip_tags($request->email);
        $customer->gender = strip_tags($request->gender);
        $customer->address = strip_tags($request->address);
        $customer->postcode = strip_tags($request->postcode);
        $customer->city = strip_tags($request->city);
        $customer->state = strip_tags($request->state);
        $customer->username = strip_tags($request->username);
        $customer->status = strip_tags($request->status);
        $customer->save();

        LogActivityController::logActivity(
            'Edit customer', 'Customer '.$customer->name." #". $customer->id ." edited", 'customer_details');
        
        return redirect()->route('customers.view', $id)
            ->with('success', 'Customer details edited successfully');
    }

    public function enterEmail($id)
    {
        
        return view("admin.pages.promo-mail", compact('id'));
    }

    public function promotionVoucher(Request $request){
        
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        $id = $request->input('id');

        $customer = Customer::find($id);

        
        $orders = Order::where('customer_id', '=', $id)
                ->whereNot('status', -1)
                ->orderByDesc('created_on')
                ->get();

        

        if($email == null){
            return view('admin.pages.customer-details', compact('customer', 'orders'));
        }

        $discount=random_int(10,80);

        try {
            $response = $this->sendPromotionFromApi($email, $discount);

            if ($response->successful()) {
                return view('admin.pages.customer-details', compact('customer', 'orders'));
            } else {
                return view('admin.pages.customer-details', compact('customer', 'orders'));
            }
        } catch (\Exception $e) {
            return view('admin.pages.customer-details', compact('customer', 'orders'));
        }
    }

    public function sendPromotionFromApi($email, $discount)
    {
        $data = [
            'receiver' => $email,
            'subject' => 'Voucher Winner',
            'message' => 'CONGRATULATIONS! <br/>You have won a voucher worth' .$discount .'% off your next purchase of selected products!<br/>'.'Terms and Conditions Apply <br/><br/>TerraByte Malaysia',
        ];

        return Http::post('http://localhost:5002/api/emailservice/send', $data);
    }
    

}