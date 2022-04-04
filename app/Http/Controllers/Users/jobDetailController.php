<?php

namespace App\Http\Controllers\Users;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnteryJob;
use App\Models\EnteryJob;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class jobDetailController extends Controller
{
    public function jobDetail($id)
    {
        $job = Job::findOrFail($id);
        $user_id = auth()->user()->id;
        return view('job-detail',compact('job','user_id'));
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
            $enteryJob->user_id = $request_data['user_id'];
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
        $id = auth()->user()->id;
        $allJobEnery = EnteryJob::where('user_id',$id)->paginate(6);
        return view('entery-job',compact('allJobEnery'));
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
