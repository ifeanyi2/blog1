<?php

namespace App\Http\Controllers;

use App\Models\User;
use id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //logout method
    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function AccountSetting()
    {
        $id = Auth::id();
        $editData = User::find($id);

        return view('backend.account.profile', compact('editData'));
    }

    public function EditUserProfile()
    {

        $id = Auth::id();
        $editData = User::find($id);

        return view('backend.account.profile_edit', compact('editData'));
    }

    public function Saveprofile(Request $request)
    {

        $data = User::find(Auth::id());
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->position = $request->position;
        $data->bank_name = $request->bank_name;
        $data->account_no = $request->account_no;
        $data->account_name = $request->account_name;
        $data->bank_name = $request->bank_name;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));

            $filename = date('YmdHmi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data->image = $filename;
        }

        $data->save();
        $notification = [
            'message' => 'user Profile Updated Successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('account.setting')->with($notification);
        
    }

    public function ChangePassword()
    {
        return view('backend.account.show_password');
    }

    public function UpdatePassword(Request $request)
    {

        $validation = $request->validate(
            [
                'oldpassword'  => 'required',
                'password' => 'required',
            ]
        );

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = [
                'message' => 'User Password Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('login')->with($notification);
        }else{
            return redirect()->back();
        }
        
    }
}
