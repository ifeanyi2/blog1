<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;

class ExtraController extends Controller
{
    //single post
    public function SinglePost($slug)
    {
        $seo = DB::table('seo')->first();
        $category = DB::table('categories')->orderBy('id', 'desc')->limit('10')->get();

        //fetch sub-category
        $subcategory = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->get();

        $livetv =  DB::table('livetv')->first();

        // fetch the social media links
        $social = DB::table('socials')->first();


        // fetch list of important websites
        $website = DB::table('websites')->get();

        // fetch three last post headline for the marquee
        $headline = DB::table('posts')->where('posts.headline', 1)->limit(3)->get();

        // fetch the notice for the marquee too
        $notice = DB::table('notice')->where('notice.status', 1)->get();

        //asidebar news
        $latest = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();

        $lastesvideo = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();

        $randomVideo  = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();




        $posts = DB::table('posts')
                 ->join('categories', 'posts.category_id', 'categories.id')
                 ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
                 ->join('users', 'posts.user_id', 'users.id')
                 ->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en', 'users.name')->where('posts.slug', $slug)->first();

        // DB::table('posts')->increment('view_count');
        DB::table('posts')->where('slug', $slug)->increment('view_count');

        // Call this dynamically or use
        // $_SERVER['REMOTE_ADDR'] but only works in server not in local
        $yourUserIpAddress = '66.102.0.0';

        $location = Location::get($yourUserIpAddress);


        return view('main.single', compact('posts', 'seo', 'category', 'subcategory', 'livetv', 'social', 'website', 'notice', 'headline', 'latest', 'lastesvideo', 'randomVideo', 'location'));
    }

    public function SinglePostVideo(Request $request ,$slug)
    {
        $seo = DB::table('seo')->first();
        $category = DB::table('categories')->orderBy('id', 'desc')->limit('10')->get();

        //fetch sub-category
        $subcategory = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->get();

        $livetv =  DB::table('livetv')->first();

        // fetch the social media links
        $social = DB::table('socials')->first();


        // fetch list of important websites
        $website = DB::table('websites')->get();

        // fetch three last post headline for the marquee
        $headline = DB::table('posts')->where('posts.headline', 1)->limit(3)->get();

        // fetch the notice for the marquee too
        $notice = DB::table('notice')->where('notice.status', 1)->get();

        //asidebar news
        $latest = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();

        $lastesvideo = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();

        $randomVideo  = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();



        $video = DB::table('videoposts')
            ->join('categories', 'videoposts.category_id', 'categories.id')
            ->join('subcategories', 'videoposts.subcategory_id', 'subcategories.id')
            ->join('users', 'videoposts.user_id', 'users.id')
            ->select('videoposts.*', 'categories.category_en', 'subcategories.subcategory_en', 'users.name')->where('videoposts.slug', $slug)->first();

        // Call this dynamically or use
        // $_SERVER['REMOTE_ADDR'] but only works in server not in local
        $yourUserIpAddress = '66.102.0.0';

        $location = Location::get($yourUserIpAddress);



            //increment/count every viewed post
        DB::table('videoposts')->where('slug', $slug)->increment('view_count');


        return view('main.vlog', compact('video', 'seo', 'category', 'subcategory', 'livetv', 'social', 'website', 'notice', 'headline', 'latest', 'lastesvideo', 'randomVideo', 'location'));
    }


    public function LikeOrVote($ip, $post_id){

        $ifExists = DB::table('uservoteip')->where('visitor', $ip)->where('post_id', $post_id)->exists();
        //dd($ifExists);

        if($ifExists === false){
            DB::table('videoposts')->where('id', $post_id)->increment('likes');

            $data = [];
            $data['visitor'] = $ip;
            $data['status'] = 1;
            $data['post_id'] = $post_id;
            DB::table('uservoteip')->insert($data);

            $notification = [
                'message' => 'Voted!',
                'alert-type' => 'success',
            ];

            return Redirect()->back()->with($notification);




        }else {

            return Redirect()->back();
        }
    }

    public function CatPostView($category_en, $id)
    {

        $lastesvideo = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();

        $randomVideo  = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();
        $seo = DB::table('seo')->first();
        $category = DB::table('categories')->orderBy('id', 'desc')->limit('10')->get();

        //fetch sub-category
        $subcategory = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->get();

        $livetv =  DB::table('livetv')->first();

        // fetch the social media links
        $social = DB::table('socials')->first();


        // fetch list of important websites
        $website = DB::table('websites')->get();

        // fetch three last post headline for the marquee
        $headline = DB::table('posts')->where('posts.headline', 1)->limit(3)->get();

        // fetch the notice for the marquee too
        $notice = DB::table('notice')->where('notice.status', 1)->get();

        //asidebar news
        $latest = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();


















        $catposts = DB::table('posts')->where('category_id', $id)->inRandomOrder()->limit(6)->get();
        $catvideo = DB::table('videoposts')->where('category_id', $id)->inRandomOrder()->get();
        // Call this dynamically or use
        // $_SERVER['REMOTE_ADDR'] but only works in server not in local
        $yourUserIpAddress = '66.102.0.0';

        $location = Location::get($yourUserIpAddress);


        return view('main.allcontent', compact('catposts', 'catvideo', 'category_en','seo', 'category', 'subcategory', 'livetv', 'social', 'website', 'notice', 'headline', 'latest', 'lastesvideo', 'randomVideo', 'location'));
    }

    public function SubCatPostView($subcategory_en, $id)
    {

        $lastesvideo = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();

        $randomVideo  = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();
        $seo = DB::table('seo')->first();
        $category = DB::table('categories')->orderBy('id', 'desc')->limit('10')->get();

        //fetch sub-category
        $subcategory = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->get();

        $livetv =  DB::table('livetv')->first();

        // fetch the social media links
        $social = DB::table('socials')->first();


        // fetch list of important websites
        $website = DB::table('websites')->get();

        // fetch three last post headline for the marquee
        $headline = DB::table('posts')->where('posts.headline', 1)->limit(3)->get();

        // fetch the notice for the marquee too
        $notice = DB::table('notice')->where('notice.status', 1)->get();

        //asidebar news
        $latest = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();


















        $subcatposts = DB::table('posts')->where('subcategory_id', $id)->inRandomOrder()->limit(6)->get();
        $subcatvideo = DB::table('videoposts')->where('subcategory_id', $id)->inRandomOrder()->get();

        // Call this dynamically or use
        // $_SERVER['REMOTE_ADDR'] but only works in server not in local
        $yourUserIpAddress = '66.102.0.0';

        $location = Location::get($yourUserIpAddress);


        return view('main.allsubcontent', compact('subcatposts', 'subcatvideo', 'subcategory_en', 'seo', 'category', 'subcategory', 'livetv', 'social', 'website', 'notice', 'headline', 'latest', 'lastesvideo', 'randomVideo', 'location'));
    }
}
