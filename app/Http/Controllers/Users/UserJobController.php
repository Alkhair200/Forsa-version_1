<?php

namespace App\Http\Controllers\Users;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Commpany_info;
use App\Http\Requests\StoreJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSinglelJob;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class UserJobController extends Controller
{

    public function index()
    {

        $user_id = Auth::user()->id;
        $jobs = Job::where('user_id',$user_id)->first();
        $my_jobs = Job::where('user_id',$user_id)->paginate(6);
        return view('customer-job',compact('jobs','my_jobs'));
    }


    public function create()
    {
        $user_id = Auth::user()->id;
        $jobs = Job::where('user_id',$user_id)->first();
        return view('add-job',compact('jobs'));
    }


    public function store(StoreJob $request)
    {
        
        DB::beginTransaction();
        try {

            $user_id = Auth::user()->id;

            $commpany_info = new Commpany_info();

            if ($request->image) {

                $commpany_info->image = $request->image;

                Image::make($request->image)->resize(80, 80)->save(public_path('uploads/img/' .$request->image->hashName()));

                $commpany_info->image = $request->image->hashName();
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
            $job->description = $request->description;
            $job->user_id = $user_id;
            $job->commpany_id = $commpany_info->id;
            $job->save();

            DB::commit();

            toastr()->success('تم الحفظ بنجاح');
            return redirect()->route('job-customer.index',compact('jobs'));
    
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
        $edit_job = Job::findOrFail($id);
        return view('add-job',compact('edit_job'));
    }

    public function update(StoreSinglelJob $request, $id)
    {
        try {
            $edit_job = Job::findOrFail($id);
            $edit_job->update([
                'type_job' => $request->type_job,
                'location' => $request->location,
                'type_time' => $request->type_time,
                'amount' => $request->amount,
                'description' => $request->description,
                'status' => 0,
            ]);
            toastr()->success('تم التعديل بنجاح');
            return redirect()->route('job-customer.index');

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Job::findOrFail($id)->delete();
            toastr()->success('تم الحذف بنجاح');
            return redirect()->route('job-customer.index',compact('jobs'));
    
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
    
        }
    }

    public function singleStore(StoreSinglelJob $request)
    {

        try {

            $user_id = Auth::user()->id;
            $commpanyId = Job::where('user_id',$user_id)->first();
            $job = new Job();

            $job->type_job = $request->type_job;
            $job->location = $request->location;
            $job->type_time = $request->type_time;
            $job->amount = $request->amount;
            $job->description = $request->description;
            $job->user_id = $user_id;
            $job->commpany_id = $commpanyId->commpany_id;
            $job->save();

            toastr()->success('تم إضافة الوظيفه بنجاح');
            return redirect()->route('job-customer.index');
    
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function getByStatus($active)
    {
        try {
            if ($active == 1) {

                $active_job = Job::selection()->where('status' ,$active)->paginate(3);
    
                if ($active_job->count()  == 0) {
                    return redirect()->route('job-customer.index');
                }
    
                return view('customer-job',compact('active_job'));
    
            }else
    
            if ($active == 0) {
    
                $not_active_job = Job::selection()->where('status' ,$active)->paginate(3);
    
                if ($not_active_job->count()  == 0) {
                    return redirect()->route('job-customer.index');
                }
    
                return view('customer-job',compact('not_active_job'));
    
            }

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    function getAllJobs()
    {
        $jobs = Job::where('status',1)->paginate(3);
        return view('jobs',compact('jobs'));
    }

}
