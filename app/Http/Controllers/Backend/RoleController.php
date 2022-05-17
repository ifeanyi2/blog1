<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }


    public function AddUser()
    {
        return view('backend.role.add');
    }

    public function SaveUser(Request $request)
    {
        $validation = $request->validate(
            [
                'name'  => 'required',
                'email' => 'required',
                'password' => 'required|min:8',
            ]
        );
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['posts'] = $request->posts;
        $data['video_post'] = $request->video_post;
        $data['website'] = $request->website;
        $data['setting'] = $request->setting;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $data['type'] = 0;

        if ($validation) {
            DB::table('users')->insert($data);

            $notification = [
                'message' => 'New User Added Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.users')->with($notification);
        }

    }

    public function AllUser()
    {
        $users = DB::table('users')->where('type', 0)->orderBy('id', 'desc')->get();
        return view('backend.role.index', compact('users'));

    }

    public function EditUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('backend.role.edit', compact('user'));
    }

    public function UpdateUser(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name'  => 'required',
                'email' => 'required',
            ]
        );
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['posts'] = $request->posts;
        $data['video_post'] = $request->video_post;
        $data['website'] = $request->website;
        $data['setting'] = $request->setting;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $data['type'] = 0;

        if ($validation) {
            DB::table('users')->where('id', $id)->update($data);

            $notification = [
                'message' => 'User Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.users')->with($notification);
        }
    }

    public function DeleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        $notification = [
            'message' => 'User deleted successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.users')->with($notification);
    }
}
