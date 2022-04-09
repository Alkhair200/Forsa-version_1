<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request_data = $request->except(['_token' , '_method']);

        $query = Job::select('*')->where('status' ,1);

        $count = count($request_data);

        $i = 0;
        

        foreach ($request_data as $key => $value) {

            $i ++;
            if ($value != "") {
               
                if ($key == "location" && !isset($request->type_time)) {

                    $jobs = $query->where('location' , $value)->paginate(3);
                    return view('jobs',compact('jobs'));

                }elseif($key == "type_time" && !isset($request->location)){ 

                    $jobs = $query->where('type_time' , $value)->paginate(3);

                    return view('jobs',compact('jobs'));

                }elseif($key == "type_job" && !isset($request->type_time) && !isset($request->location)){
                    
                     $jobs = $query->where('type_job' , 'like' , '%' .$request->type_job . '%')->paginate(3);
                    return view('jobs',compact('jobs'));

                }
                
                elseif(isset($request->type_time) &&  isset($request->location) && isset($request->type_job)){

                    $query
                    ->where('location' , $request->location)
                    ->where('type_time' , $request->type_time)
                    ->where('type_job' , 'like' , '%' .$request->type_job . '%');

                    $jobs = $query->paginate(3);
                    return view('jobs',compact('jobs'));

                }elseif(isset($request->type_job) && isset($request->location)){
                    $query
                    ->where('location' , $request->location)
                    ->where('type_job' , 'like' , '%' .$request->type_job . '%');

                    $jobs = $query->paginate(3);
                    return view('jobs',compact('jobs'));

                }elseif(isset($request->type_job) && isset($request->type_time)){
                    $query
                    ->where('type_job' , 'like' , '%' .$request->type_job . '%')
                    ->where('type_time' , $request->type_time);

                    $jobs = $query->paginate(3);
                    return view('jobs',compact('jobs'));

                }elseif(isset($request->type_time) && isset($request->location)){
                    $query
                    ->where('location' , $request->location)
                    ->where('type_time' , $request->type_time);

                    $jobs = $query->paginate(3);
                    return view('jobs',compact('jobs'));

                }
                
                else{
                    $jobs = $query->where($key , $value)->paginate(3);
                    return view('jobs',compact('jobs'));
                }

            } 
            
        }
    }
}
