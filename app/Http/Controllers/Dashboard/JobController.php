<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Commpany_info;
use App\Http\Requests\StoreJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::paginate(5);
        return view('dashboard.jobs.index',compact('jobs'));
    }

    public function create()
    {
        return view('dashboard.jobs.create');
    }


    public function store(StoreJob $request)
    {
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;

            $commpany_info = new Commpany_info();

            if ($request->image) {
                $commpany_info->image = $request->image;
            }
            
            $commpany_info->name_commpany = $request->name_commpany;
            $commpany_info->email = $request->email;
            $commpany_info->about_commpany = $request->about_commpany;
            $commpany_info->save();

            $job = new Job();

            $job->type_job = $request->type_job;
            $job->location = $request->location;
            $job->type_time = $request->type_time;
            $job->amount = $request->amount;
            $job->user_id = $user_id;
            $job->commpany_id = $commpany_info->id;
            $job->save();

            DB::commit();

            toastr()->success('تم الحفظ بنجاح');
            return redirect()->route('job.index');
    
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
    
        }
    }


    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('dashboard.jobs.edit',compact('job'));
    }

    public function update(Request $request, $id)
    {
        try {
            $edit_job = Job::findOrFail($id);
            $edit_job->update([
                'type_job' => $request->type_job,
                'location' => $request->location,
                'type_time' => $request->type_time,
                'amount' => $request->amount,
                'status' => $request->status,
            ]);
            toastr()->success('تم التعديل بنجاح');
            return redirect()->route('job.index');

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Job::findOrFail($id)->delete();
            toastr()->error('تم الحذف بنجاح');
            return redirect()->route('job.index');

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    function getByStatus($active)
    {

        try {
            if ($active == 1) {

                $active_job = Job::where('status' ,$active)->paginate(5);
    
                return view('dashboard.jobs.index',compact('active_job'));
    
            }else
    
            if ($active == 0) {
    
                $not_active_job = Job::where('status' ,$active)->paginate(5);
    
                return view('dashboard.jobs.index',compact('not_active_job'));
    
            }

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    function changeStatus($id)
    {
        try {
            $edit_status = Job::findOrFail($id);
            if($edit_status->status == 1){
                $edit_status->update([
                    'status' => 0,
                ]);
            }else{
                $edit_status->update([
                    'status' => 1,
                ]);
            }
            toastr()->success('تم التعديل بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
