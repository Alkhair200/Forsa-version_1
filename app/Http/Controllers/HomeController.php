<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_jobs = Job::where('status',1)->get();
        $not_active_jobs = Job::where('status',0)->get();
        $users = User::where('admin', 0)->get();
        return view('dashboard.index',compact('active_jobs','not_active_jobs','users'));
    }
}
