<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WebsiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function WebSiteSetting()
    {
        $website = DB::table('websitesettings')->first();
        return view('backend.settings.website', compact('website'));
    }

    public function UpdateWebSiteSetting(Request $request, $id)
    {
        $data = [];
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;

        $notification = [
            'message' => 'Website Settings updated successfully!',
            'alert-type' => 'success'
        ];

        DB::table('websitesettings')->where('id', $id)->update($data);
        return redirect()->back()->with($notification);
    }
}
