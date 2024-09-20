<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminStaffController extends Controller
{
    public function index()
    {
        $admins = Admin::select('id','name', 'birthdate', 'phone', 'email', 'gender', 'username', 'password', 'status', 'created_on', 'position_id')->get();
        
        return view('admin.pages.staff-page', compact('admins'));
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        //$formattedDob = Carbon::parse($admin->dob)->format('Y-m-d');

        return view("admin.pages.profile", compact('admin'));
    }

    public function reports(){
        return view("admin.pages.report-page");
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
        $id= $request->delete_id;
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
