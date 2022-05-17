<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function PhotoGallery(){
        $photo = DB::table('photos')->orderBy('id', 'desc')->paginate(5);
        return view('backend.gallery.photos', compact('photo'));
    }
    public function AddPhoto(){
        return view('backend.gallery.addphoto');
    }

    public function StorePhoto(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:photos|max:255',
            'type' => 'required|',
            'photo' => 'required|unique:photos|file|mimes:jpg,jeg,png,svg,ico,gif|max:10000',
        ]);

        $data = [];
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['user_id'] = Auth::id();
        $image = $request->photo;

        if ($image) {
            $image_one = uniqid() .'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(500,300)->save('image/photogallery/'.$image_one);
            $data['photo'] = 'image/photogallery/'.$image_one;

            DB::table('photos')->insert($data);
            $notification = [
                'message' => 'New Photo Added Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('photo.gallery')->with($notification);
        }else {
            return Redirect()->back();
        }






        // DB::table('districts')->insert($data);

        // $notification = [
        //     'message' => 'District saved successfully!',
        //     'alert-type' => 'success'
        // ];


        // return redirect()->route('districts')->with($notification);
    }

    public function EditPhoto($id){
        $photo = DB::table('photos')->where('id', $id)->first();
        return view('backend.gallery.editphoto', compact('photo'));
    }

    public function UpdatePhoto(Request $request, $id){
         $validated = $request->validate([
            'title' => 'required|unique:photos|max:255',
            'type' => 'required|',
        ]);

        $data = [];
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $image = $request->photo;


        $oldphoto = $request->oldphoto;

        if ($image) {
            $image_one = uniqid() .'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(500,300)->save('image/photogallery/'.$image_one);
            $data['photo'] = 'image/photogallery/'.$image_one;

            DB::table('photos')->where('id', $id)->update($data);
            $notification = [
                'message' => 'Photo Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('photo.gallery')->with($notification);
        }else {
             $data['photo'] = $oldphoto;

             DB::table('photos')->where('id', $id)->update($data);
            $notification = [
                'message' => 'Photo Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('photo.gallery')->with($notification);
        }
    }

    public function DeletePhoto($id){
         $photo = DB::table('photos')->where('id', $id)->first();
        unlink($photo->photo);


        DB::table('photos')->where('id', $id)->delete();
        $notification = [
                'message' => 'Photo Delete Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('photo.gallery')->with($notification);
    }


    // -------------------- video gallery section -------------------------
    public function VideoGallery(){
        $video = DB::table('videos')->orderBy('id', 'desc')->paginate(5);
        return view('backend.gallery.videos', compact('video'));
    }

    public function AddVideo(){
        return view('backend.gallery.addvideo');
    }

    public function Store1Video(Request $request){
          $validated = $request->validate([
            'title' => 'required|unique:videos|max:255',
            'type' => 'required|',
            'embed_code' => 'required|unique:videos',
        ]);

        $data = [];
        $data['embed_code'] = $request->embed_code;
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['embed_code'] = $request->embed_code;

         DB::table('videos')->insert($data);
            $notification = [
                'message' => 'New Video Added Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('video.gallery')->with($notification);
    }

    public function EditVideo($id){
        $video = DB::table('videos')->where('id', $id)->first();
        return view('backend.gallery.editvideo', compact('video'));
    }

    public function UpdateVideo(Request $request, $id){

         $validated = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'embed_code' => 'required',
        ]);

        $data = [];
        $data['embed_code'] = $request->embed_code;
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['embed_code'] = $request->embed_code;

         DB::table('videos')->where('id', $id)->update($data);
            $notification = [
                'message' => 'Video Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('video.gallery')->with($notification);
    }

    public function DeleteVideo($id){
        DB::table('videos')->where('id', $id)->delete();
        $notification = [
                'message' => 'Video Deleted Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('video.gallery')->with($notification);
    }
}
