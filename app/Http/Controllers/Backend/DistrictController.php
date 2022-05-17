<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
        $districts = DB::table('districts')->orderBy('id', 'desc')->paginate(5);
        return view('backend.districts.index', compact('districts'));
    }

    public function AddDistricts(){
        return view('backend.districts.create');
    }

    public function StoreDistricts(Request $request){
        //validate input
        $validated = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
        ]);

        $data = [];
        $data['district_en'] = $request->district_en;
        DB::table('districts')->insert($data);

        $notification = [
            'message' => 'District saved successfully!',
            'alert-type' => 'success'
        ];


        return redirect()->route('districts')->with($notification);
    }

    public function EditDistricts($id){
        $district = DB::table('districts')->where('id', $id)->first();
        return view("backend.districts.edit", compact('district'));
    }

    public function UpdateDistricts(Request $request, $id){
        $data = [];
        $data['district_en'] = $request->district_en;

        $notification = [
            'message' => 'District updated successfully!',
            'alert-type' => 'success'
        ];

        DB::table('districts')->where('id', $id)->update($data);
        return redirect()->route('districts')->with($notification);
    }

    public function DeleteDistricts($id){
        DB::table('districts')->where('id', $id)->delete();
        $notification = [
            'message' => 'District deleted successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('districts')->with($notification);
    }
}
