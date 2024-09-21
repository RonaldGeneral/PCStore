<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    
    public function index(){
        $logactivitys = LogActivity::all();
    }


    public function logActivity($title, $description, $page, $admin_id){

        $logactivity = new LogActivity();
        $logactivity->title=$title;
        $logactivity->description=$description;
        $logactivity->page=$page;
        $logactivity->admin_id=$admin_id;

    }



}
