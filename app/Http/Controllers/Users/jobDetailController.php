<?php

namespace App\Http\Controllers\Users;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnteryJob;
use App\Models\EnteryJob;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Commpany_info;
use Illuminate\Support\Facades\Auth;

class jobDetailController extends Controller
{
    public function jobDetail($id)
    {
        $job = Job::findOrFail($id);
        $company_id = $job->commpany_id;
        return view('job-detail',compact('job','company_id'));
    }

    public function store(StoreEnteryJob $request)
    {
        try {

            $request_data = $request->except('_token');

            $fileName = $request_data['cv']->getClientOriginalName();

            $request_data['cv']->move('uploads/attachments' ,$fileName);

            $enteryJob = new EnteryJob();
            $enteryJob->full_name = $request_data['full_name'];
            $enteryJob->email = $request_data['email'];
            $enteryJob->phone = $request_data['phone'];
            $enteryJob->description = $request_data['description'];
            $enteryJob->job_id = $request_data['job_id'];
            $enteryJob->company_id = $request_data['company_id'];
            $enteryJob->cv = $fileName;
            $enteryJob->save();

            toastr()->warning('تم تقديم طلبك بنجاح');
            return redirect()->route('all-job');

    } catch (\Exception $ex) {
        return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
    }
    }

    function show()
    {
        $user_id = Auth::user()->id;
        $jobs = Job::where('user_id',$user_id)->first();
        $company_id = $jobs->commpany_id;

        $allJobEnery = EnteryJob::where('company_id',$company_id)->paginate(6);
        return view('entery-job',compact('allJobEnery','jobs'));
    }

    public function download($id)
    {
        $jobInfo = EnteryJob::findOrFail($id);
        return response()->download(public_path('uploads/attachments/') .$jobInfo->cv);
    }

    public function destroy($id)
    {
        try {

            EnteryJob::findOrFail($id)->delete();

            toastr()->warning('تم الحذف بنجاح');
            return redirect()->route('all-intery-job');

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
