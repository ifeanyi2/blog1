<?php

namespace App\Http\Controllers\Backend;

use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use FFMpeg\Media\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;

class VidepostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CreateVideo(){
         //get categories
        $category = DB::table('categories')->get();
        //get districts
        $district = DB::table('districts')->get();
        return view('backend.videopost.create', compact('category', 'district'));
    }

    public function AllVideo(){
        $allvideo = DB::table('videoposts')
        ->join('categories', 'videoposts.category_id', 'categories.id')
        ->join('subcategories', 'videoposts.subcategory_id', 'subcategories.id')
        ->join('districts', 'videoposts.district_id', 'districts.id')
        ->join('subdistricts', 'videoposts.subdistrict_id', 'subdistricts.id')
        ->select('videoposts.*', 'categories.category_en', 'subcategories.subcategory_en', 'districts.district_en', 'subdistricts.subdistrict_en')
        ->where('user_id', Auth::id())
        ->orderBy('id', 'desc')->paginate(5);;
        return view('backend.videopost.index', compact('allvideo'));
    }

    public function EditVideos($id)
    {
        $editvideos = DB::table('videoposts')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.videopost.edit', compact('editvideos', 'category', 'district'));
    }

    public function StoreVideo(Request $request){
        $validation = $request->validate(
            [
                'video' => 'required|file|mimetypes:video/mp4, video/webm, video/ogv, video/ogx, video/oga,video/ogg, max:2000000',
                'title' => 'required|unique:videoposts',
                'category_id' => 'required',
                'district_id' => 'required',
                'tags_en' => 'required',
                'description_en' => 'required',
                'thumbnail' => 'file',
            ]
        );
        $data = [];
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['tags_en'] = $request->tags_en;
        $data['description_en'] = $request->description_en;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('F');

        //create slug for post
        $slug = str_replace(' ', '-', $request->title);
        $data['slug'] = $slug;



        if($request->hasFile('thumbnail')){

            $upload_image_name = time().'_'.$request->thumbnail->getClientOriginalName();
            $request->thumbnail->move('image/postvideo/thumbnails', $upload_image_name);
            $data['thumbnail'] = 'image/postvideo/thumbnails/'.$upload_image_name;

        }else{

            $upload_image_name = 'image/postvideo/thumbnails/default.png';
            $data['thumbnail'] = $upload_image_name;
        }




        $video  = $request->file('video');
        if ($video) {

            $video_one = uniqid() .'.'.$video->getClientOriginalExtension();
            $video->move('image/postvideo', $video_one);


            $data['video'] = 'image/postvideo/'.$video_one;


            DB::table('videoposts')->insert($data);
            $notification = [
                'message' => 'New Video Post Added Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.video')->with($notification);
        }else {
            $notification = [
                'message' => 'Upload Failed!',
                'alert-type' => 'danger'
            ];
            return Redirect()->back()->with($notification);
        }
    }



    public function UpdateVideos(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'video' => 'file|mimetypes:video/mp4, video/webm, video/ogv, video/ogx, video/oga,video/ogg, max:2000000',
                'title' => 'required',
                'category_id' => 'required',
                'district_id' => 'required',
                'tags_en' => 'required',
                'description_en' => 'required'
            ]
        );
        $data = [];
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['tags_en'] = $request->tags_en;
        $data['description_en'] = $request->description_en;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('F');

        //create slug for post
        $slug = str_replace(' ', '-', $request->title);
        $data['slug'] = $slug;




        $oldvideo = $request->oldvideo;
        $video  = $request->file('video');

        if (!$video) {

            $upload_image_name = $oldvideo;

        }else{

            $upload_image_name = time() . '_' . $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move('image/postvideo/thumbnails', $upload_image_name);
        }



        $data['thumbnail'] = 'image/postvideo/thumbnails/' . $upload_image_name;


        if ($video) {




            $video_one = uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move('image/postvideo', $video_one);


            $data['video'] = 'image/postvideo/' . $video_one;

            DB::table('videoposts')->where('id', $id)->update($data);
            $notification = [
                'message' => 'Video Post Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.video')->with($notification);


        } else {
            $upload_image_name = $request->oldthumbnail;
            $data['thumbnail'] = $upload_image_name;


            $data['video'] = $oldvideo;
            DB::table('videoposts')->where('id', $id)->update($data);
            $notification = [
                'message' => 'Video Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.video')->with($notification);
        }
    }


    public function DeleteVideos($id)
    {
        $videopost = DB::table('videoposts')->where('id', $id)->first();
        unlink($videopost->video);
        unlink($videopost->thumbnail);

        DB::table('videoposts')->where('id', $id)->delete();
        $notification = [
            'message' => 'Video Post Deleted Successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.video')->with($notification);
    }






}
