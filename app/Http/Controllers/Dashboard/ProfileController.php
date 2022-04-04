<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {

        $users = User::all();
        return view('dashboard.profile.index', compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' =>'required', 'string', 'max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);

        try {

            $request_data = $request->all();

            if (isset($request->admin) && $request->admin === "admin") {
                
                $request_data['admin'] = 1;
            }else {
                $request_data['admin'] = 0;
            }

            $request_data['password'] = Hash::make($request_data['password']);
            
            User::create($request_data);
            
            toastr()->success(__('site.added_successfully'));
            return redirect()->route('profile.index');

        } catch (\Throwable $th) {
            
            return $th->getMessage();
        }
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

        $request->validate([
            'name' =>'required', 'string', 'max:100',
            'email' => 'required|string|email|max:255|unique:users,id,'.$id,
            'new_password' => 'required|min:6',
            'old_password' => 'required',
        ]);

        if ($request->new_password == "" || $request->old_password == "" || $request->email == "" || $request->name == "") {

            toastr()->error(__('site.not_found'));
       
            return redirect()->route('profile.index');

        }else {
            
            $users = User::find($id);
     
            $hashedPassword = $users->password;
            if (\Hash::check($request->old_password , $hashedPassword)) {
                if (!Hash::check($request->new_password , $hashedPassword)) {

                    $request_data = $request->all();

                    if (isset($request->admin) && $request->admin === "admin") {
                
                        $request_data['admin'] = 1;
                    }else {
                        $request_data['admin'] = 0;
                    }

                    $request_data['password'] = Hash::make($request_data['new_password']);

                    $user = User::findOrFail($id);
                    $user->update($request_data);

                    toastr()->success(__('site.updated_successfully'));
       
                    return redirect()->route('profile.index');
                }
                else{

                    toastr()->warning(('لا يمكن أن تكون كلمة المرور الجديدة هي كلمة المرور القديمة!'));
       
                    return redirect()->route('profile.index');
                } 
            }
            else{

                toastr()->warning(('كلمة المرور القديمة غير متطابقة'));
       
                return redirect()->route('profile.index');
            }

        }

    }

    public function destroy($id)
    {
        try {         

            $user = User::find($id);

            if (!$user) {

                toastr()->error(__('site.error'));
           
                return redirect()->route('profile.index');
            }

            $user->delete();

            toastr()->success(__('site.deleted_successfully'));
       
            return redirect()->route('profile.index');

        } catch (\Exception $ex) {

            return response()->json(['errors' => $ex->getMessage()]);
        }
    }
}
