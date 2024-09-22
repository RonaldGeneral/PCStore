<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Position;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use XSLTProcessor;

class AdminStaffController extends Controller
{
    public function index()
    {
        $admins = Admin::select('id', 'name', 'birthdate', 'phone', 'email', 'gender', 'username', 'password', 'status', 'created_on', 'position_id')->get();
        $positions = Position::all();
        
        return view('admin.pages.staff-page', compact('admins', 'positions'));
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        

        
        $xml = new \DOMDocument();
        $xml->load(Storage::disk('xslt')->path('logactivity.xml'));

        $xsl = new \DOMDocument();
        $xsl->substituteEntities = TRUE;
        $xsl->load(Storage::disk('xslt')->path('logactivity.xsl'));

        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->importStylesheet($xsl);

        
        $logactivity_html = $xsltProcessor->transformToXML($xml);
        

        return view("admin.pages.profile", compact('admin', 'logactivity_html'));
    }

    public function create(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',
            'birthdate' => 'required|before:today',
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
        $admin->password = Hash::make($request->password);
        $admin->status = strip_tags($request->status);
        $admin->position_id = strip_tags($request->position_id);


        $admin->save();

        LogActivityController::logActivity(
            'Add staff', 'Staff '.$admin->name." #". $admin->id ." added", 'staff_page');

        return redirect()->route('admins.index');
    }

    public function destroy(Request $request)
    {
        $id = $request->delete_id;
        $admin = Admin::find($id);
        LogActivityController::logActivity(
            'Delete staff', 'Staff '.$admin->name." #". $admin->id ." deleted", 'staff_page');
        $admin->delete();
        return redirect()->route('admins.index')
            ->with('success', 'Admin deleted successfully');
    }

    public function view($id)
    {
        $admin = Admin::find($id);

        
        $logactivitys = LogActivity::where('admin_id', '=', $id)
                        ->orderByDesc('created_on')
                        ->get();

        return view('admin.pages.staff-details', compact('admin', 'logactivitys'));
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
            'birthdate' => 'required|before:today',
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

        LogActivityController::logActivity(
            'Edit staff', 'Staff '.$admin->name." #". $admin->id ." edited", 'staff_page');

        return redirect()->route('admins.view', $id)
            ->with('success', 'Admin details edited successfully');
    }

    
}
