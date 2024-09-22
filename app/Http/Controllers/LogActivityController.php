<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LogActivityController extends Controller
{
    
    public function index(){
        $logactivitys = LogActivity::all();
        return view('admin.pages.log-record', compact('logactivitys'));

    }


    public static function logActivity($title, $description, $page){

        $admin_id = Auth::guard('admin')->user()->id;

        $logactivity = new LogActivity();

        $logactivity->title = $title;
        $logactivity->description = $description;
        $logactivity->page = $page;
        $logactivity->admin_id=$admin_id;

        $logactivity->save();

    }

    
    
    

    

    

}
