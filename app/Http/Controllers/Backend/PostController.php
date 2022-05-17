<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //display all posts
    public function Index(){
        $post = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
        ->join('districts', 'posts.district_id', 'districts.id')
        ->join('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
        ->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en', 'districts.district_en', 'subdistricts.subdistrict_en')
        ->where('user_id', Auth::id())
        ->orderBy('id', 'desc')->paginate(5);
        return view('backend.posts.index', compact('post'));


    }
    //create post form view
    public function CreatePost(){
        //get categories
        $category = DB::table('categories')->get();
        //get districts
        $district = DB::table('districts')->get();

        return view('backend.posts.create', compact('category','district'));
    }

    public function EditPost($id){
        $post = DB::table('posts')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.posts.edit', compact('post', 'category', 'district'));
    }

    public function UpdatePost(Request $request, $id){

        $validation = $request->validate(
            [
                'title_en'  => 'required',
                'category_id' => 'required',
                'district_id' => 'required',
                'tags_en' => 'required',
                'details_en' => 'required'
            ]
        );
        $data = [];
        $data['title_en'] = $request->title_en;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['tags_en'] = $request->tags_en;
        $data['details_en'] = $request->details_en;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;

        //create slug for post
        $slug = str_replace(' ', '-', $request->title_en);
        $data['slug'] = $slug;



        $oldimage = $request->oldimage;
        $image = $request->image;
        if ($image) {
            $image_one = uniqid() .'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
            $data['image'] = 'image/postimg/'.$image_one;

            DB::table('posts')->where('id', $id)->update($data);
            unlink($oldimage);
            $notification = [
                'message' => 'Post Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.post')->with($notification);
        }else {
            $data['image'] = $oldimage;
            DB::table('posts')->where('id', $id)->update($data);
            $notification = [
                'message' => 'Post Updated Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.post')->with($notification);
        }

    }

    public function StorePost(Request $request){

        $validation = $request->validate(
            [
                'title_en'  => 'required|unique:posts',
                'category_id' => 'required',
                'district_id' => 'required',
                'tags_en' => 'required',
                'details_en' => 'required|unique:posts',
                'image' => 'required|file|mimes:jpg,jeg,png,svg,ico,gif|max:10000'
            ]
        );
        $data = [];
        $data['title_en'] = $request->title_en;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['tags_en'] = $request->tags_en;
        $data['details_en'] = $request->details_en;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;


        //create slug for post
        $slug = str_replace(' ', '-', $request->title_en);
        $data['slug'] = $slug;


        $image = $request->image;
        if ($image) {
            $image_one = uniqid() .'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
            $data['image'] = 'image/postimg/'.$image_one;

            DB::table('posts')->insert($data);
            $notification = [
                'message' => 'New Post Added Successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.post')->with($notification);
        }else {
            return Redirect()->back();
        }
    }

    public function GetSubCategory($category_id){
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        //return response as a json data
        return response()->json($sub);
    }

    public function GetSubDistrict($district_d){
        $sub = DB::table('subdistricts')->where('district_id', $district_d)->get();
        return response()->json($sub);
    }

    public function DeletePost($id){
        $post = DB::table('posts')->where('id', $id)->first();
        unlink($post->image);

        DB::table('posts')->where('id', $id)->delete();
        $notification = [
            'message' => 'Post Deleted Successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.post')->with($notification);
    }




}
