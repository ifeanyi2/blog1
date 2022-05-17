<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubDistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
        $subdistrict = DB::table('subdistricts')
        ->join('districts', 'subdistricts.district_id', 'districts.id')
        ->select('subdistricts.*', 'districts.district_en')
        ->orderBy('id', 'desc')->paginate(5);


        return view('backend.subdistrict.index', compact('subdistrict'));
    }

    public function AddSubDestricts(){
        //fetch parent controller
        $district = DB::table('districts')->get();
        return view('backend.subdistrict.create', compact('district'));
    }

    public function StoreSubDistricts(Request $request){
            //validate input
          $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'district_id' => 'required',
        ]);

        $data = [];
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['district_id'] = $request->district_id;

        $notification = [
            'message' => 'Subdistricts saved successfully!',
            'alert-type' => 'success'
        ];

        DB::table('subdistricts')->insert($data);
        return redirect()->route('subdistricts')->with($notification);
    }

    public function EditSubDestricts($id){
        $subdistrict = DB::table('subdistricts')->where('id', $id)->first();

        $district = DB::table('districts')->get();
        return view('backend.subdistrict.edit', compact('subdistrict', 'district'));
    }

    public function UpdateSubDestricts(Request $request, $id){
        $data = [];
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['district_id'] = $request->district_id;

        $notification = [
            'message' => 'SubDistrict updated successfully!',
            'alert-type' => 'success'
        ];

        DB::table('subdistricts')->where('id', $id)->update($data);
        return redirect()->route('subdistricts')->with($notification);
    }

    public function DeleteSubDestricts($id){
        DB::table('subdistricts')->where('id', $id)->delete();
        $notification = [
            'message' => 'SubDistrict deleted successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('subdistricts')->with($notification);
    }
}
