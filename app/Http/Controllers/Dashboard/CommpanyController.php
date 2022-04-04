<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Commpany_info;
use PhpParser\Node\Stmt\Use_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CommpanyUpdate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CommpanyController extends Controller
{

    public function index()
    {
        try {

            $users = User::where(['admin' =>0, 'status' =>1])->get();
            return view('dashboard.commpany.index',compact('users'));

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
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
        try {

            $commpany_info = Commpany_info::findOrFail($id);
            $active_job = Job::where('status' ,1)->where('commpany_id' , $commpany_info->id)->get();
            $not_active_job = Job::where('status' ,0)->where('commpany_id' , $commpany_info->id)->get();
            return view('dashboard.commpany.show',compact('commpany_info','not_active_job','active_job'));

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {

            $user = User::findOrFail($id);
            return view('dashboard.commpany.edit',compact('user'));

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        try {

            $user = User::findOrFail($id);

            $request_data = $request->except(['_token']);

            if ($request_data['password']) {

                $user->update([ 'password' => Hash::make($request_data['password'])]);
            }

            $user->update([
                'name' => $request_data['name'],
                'email' => $request_data['email'],
            ]);

            toastr()->success('تم التعديل بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            toastr()->error('تم الحذف بنجاح');
            return redirect()->route('job.index');

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }


    function active($id)
    {

        try {
            $edit_status = User::findOrFail($id);
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

    public function getByNotActive()
    {
        try {

            $users_not_active = User::where('status' ,0)->get();
            return view('dashboard.commpany.index',compact('users_not_active'));

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
