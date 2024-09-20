<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

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
        $customer->password = strip_tags($request->password);
        $customer->status = 1;  //this actually for account freezing

        $customer->save();

        
    
        return redirect()->route('customers.index');
    }

    public function destroy(Request $request)
    {
        $id= $request->delete_id;
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully');
    }

    public function view($id)
    {
        $customer = Customer::find($id);
        
        return view('admin.pages.customer-details', compact('customer'));
    }

    public function edit_details($id, Request $request)
    {
        $customer = Customer::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date_format:D-M-Y|before:today',
            'phone' => 'required|digits:12',
            'email' => 'required|email|unique:customer,email',
            'gender' => 'required',
            'address' => 'required|max:500',
            'postcode' => 'required|max:20',
            'city' => 'required|digits:500',
            'state' => 'required|max:500',
            'username' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
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
        $customer->password = strip_tags($request->password);
        $customer->status = strip_tags($request->status);
        $customer->save();

        
        
        return redirect()->route('customers.view', $id)
            ->with('success', 'Customer details edited successfully');
    }

    

}