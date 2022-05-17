<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WebsitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
        $website = DB::table('websites')->orderBy('id', 'desc')->paginate(5);
        return view('backend.websites.index', compact('website'));
    }

    public function CreateWebsite(){
        return view('backend.websites.create');
    }


    public function StoreWebsite(Request $request){
        $validated = $request->validate([
            'website_name' => 'required|unique:websites|max:100',
            'website_link' => 'required|unique:websites|max:100',
        ]);

        $data = [];
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;

        $notification = [
            'message' => 'Website Added successfully!',
            'alert-type' => 'success'
        ];

        DB::table('websites')->insert($data);
        return redirect()->route('all.websites')->with($notification);
    }

    public function EditWebsite($id){
        $website = DB::table('websites')->where('id', $id)->first();
        return view('backend.websites.edit', compact('website'));
    }

    public function UpdateWebsite(Request $request, $id){
        $validated = $request->validate([
            'website_name' => 'required|unique:websites|max:100',
            'website_link' => 'required|unique:websites|max:100',
        ]);

        $data = [];
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;

        $notification = [
            'message' => 'Website Updated successfully!',
            'alert-type' => 'success'
        ];

        DB::table('websites')->where('id', $id)->update($data);
        return redirect()->route('all.websites')->with($notification);
    }

    public function DeleteWebsite($id){
        DB::table('websites')->where('id', $id)->delete();
        $notification = [
            'message' => 'Website Deleted successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.websites')->with($notification);

    }
}
