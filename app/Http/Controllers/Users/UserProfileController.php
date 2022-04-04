<?php

namespace App\Http\Controllers\Users;

use App\Models\Job;
use App\Models\Commpany_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $jobs = Job::where('user_id',$user_id)->first();
        $user_job = Job::where('user_id',$user_id)->first();
        return view('profile.index' ,compact('jobs','user_job'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        try {

            $jobs = Job::where('user_id',$id)->first();
            $commpany = Commpany_info::findOrFail($jobs->commpany_id);

            $request_data = $request->except(['_token']);

            if ($request->image) {

                if ($commpany->image != 'img.png') {

                Storage::disk('public_uploads')->delete('/img/' .$commpany->image);

                Image::make($request->image)->resize(80, 80)->save(public_path('uploads/img/' .$request->image->hashName()));

                $request_data['image'] = $request->image->hashName();

                $commpany->update([ 'image' => $request_data['image']]);

            }

        }else {

            $request_data['image'] = 'img.png';
        }

            $commpany->update($request_data);

            toastr()->success('تم التعديل بنجاح');
            return redirect()->route('job-customer.index');

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
        
    }


    public function destroy($id)
    {
        //
    }
}
