<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $jobs = Job::where('status',1)->orderBy('created_at')->take(6)->get();
        return view('welcome',compact('jobs'));
    }
}
