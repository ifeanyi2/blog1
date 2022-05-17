<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index()
    {
        $ads = DB::table('ads')->orderBy('id', 'desc')->get();
        return view('backend.ads.index', compact('ads'));
    }

    public function AddNewAds()
    {
        return view('backend.ads.create');
    }

    public function StoreAds(Request $request)
    {


        $data = [];
        $data['link'] = $request->link;


        if($request->type == 0){
            $image = $request->ads;

            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(970, 90)->save('image/ads/' . $image_one);
                $data['ads'] = 'image/ads/' . $image_one;
                $data['type'] = 0;

                DB::table('ads')->insert($data);
                $notification = [
                    'message' => 'Vertical ADS Added Successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('list.ads')->with($notification);
            } else {
                return Redirect()->back();
            }

        }else {
            $image = $request->ads;

            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(500, 500)->save('image/ads/' . $image_one);
                $data['ads'] = 'image/ads/' . $image_one;
                $data['type'] = 1;

                DB::table('ads')->insert($data);
                $notification = [
                    'message' => 'Horizontal ADS Added Successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('list.ads')->with($notification);
            } else {
                return Redirect()->back();
            }
        }
    }



    public function EditNewAds($id)
    {
        $ads = DB::table('ads')->where('id', $id)->first();

        return view('backend.ads.edit', compact('ads'));
    }

    public function UpdateAds(Request $request, $id)
    {
        $data = [];
        $data['link'] = $request->link;


        if ($request->type == 0) {

            $oldimage = $request->old;
            $image = $request->ads;

            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(970, 90)->save('image/ads/' . $image_one);
                $data['ads'] = 'image/ads/' . $image_one;
                $data['type'] = 0;

                DB::table('ads')->where('id', $id)->update($data);
                unlink($oldimage);
                $notification = [
                    'message' => 'Ads Updated Successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('list.ads')->with($notification);
            } else {
                $data['ads'] = $oldimage;
                DB::table('ads')->where('id', $id)->update($data);
                $notification = [
                    'message' => 'Ads Updated Successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('list.ads')->with($notification);
            }
        } else {

            $oldimage = $request->old;
            $image = $request->ads;

            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(500, 500)->save('image/ads/' . $image_one);
                $data['ads'] = 'image/ads/' . $image_one;
                $data['type'] = 1;

                DB::table('ads')->where('id', $id)->update($data);
                unlink($oldimage);
                $notification = [
                    'message' => 'Ads Updated Successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('list.ads')->with($notification);
            } else {
                $data['ads'] = $oldimage;
                DB::table('ads')->where('id', $id)->update($data);
                $notification = [
                    'message' => 'Ads Updated Successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('list.ads')->with($notification);
            }
        }
    }


    public function DeleteAds($id)
    {
        $ads = DB::table('ads')->where('id', $id)->first();
        unlink($ads->ads);

        DB::table('ads')->where('id', $id)->delete();
        $notification = [
            'message' => 'ADS Deleted Successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('list.ads')->with($notification);
    }
}
