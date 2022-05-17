<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;

class FrontendController extends Controller
{
    public function Index()
    {
        $fetch_id = "";
        //fetch all category
        $category = DB::table('categories')->orderBy('id', 'desc')->limit('10')->get();

        //fetch sub-category
        $subcategory = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_en')
            ->orderBy('id', 'desc')->get();


        // fetch the live tv
        $livetv =  DB::table('livetv')->first();

        // fetch the social media links
        $social = DB::table('socials')->first();

        // fetch the SEO for the frontpage seo information
        $seo = DB::table('seo')->first();

        // fetch list of important websites
        $website = DB::table('websites')->get();


        // fetch three last post headline for the marquee
        $headline = DB::table('posts')->where('posts.headline', 1)->limit(3)->get();

        // fetch the notice for the marquee too
        $notice = DB::table('notice')->where('notice.status', 1)->get();

        // fetch frontpage banner post with first section thumbnail
        $firstsectionbig = DB::table('posts')->where('first_section_thumbnail', 1)->orderBy('id', 'desc')->first();

        // fetch 8 latest post
        $firstsection = DB::table('posts')->where('first_section', 1)->orderBy('id', 'desc')->limit(8)->get();

        //category with associated post for a section
        $firstcategory = DB::table('categories')->first();


        //under the $firstcategory fetch posts with bigthumbnail
        $firstcatpostbig = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.category_en')
        ->orderBy('id', 'desc')->where('posts.bigthumbnail', 0)->limit(1)->get();


        //get three post under $firstcategory
        $firstcatpostsmall = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.category_en')
        ->orderBy('id', 'desc')->where('posts.bigthumbnail', 0)->limit(3)->get();





        // get another category as the section lead information, with id = 6
        $secondcategory = DB::table('categories')->where('id', 6)->first();

        //get post under $secondcategory also with the category id = 6 and bigthumbnail = 6
        $secondcatpostbig = DB::table('posts')->where('category_id', 6)->where('bigthumbnail', 1)->first();

        // get 3 or 2 post that has $secondcategory as associate category id = 6
        $secondcatpostsmall = DB::table('posts')->where('category_id', 6)->where('bigthumbnail', 0)->limit(2)->get();

        // fetch category for displaying some video posts
        $videoCategoryFirst = DB::table('categories')->where('id', 1)->first();

        //get post under $secondcategory also with the category id = 6 and bigthumbnail = 6
        $videoPostBigThumbnail = DB::table('videoposts')->where('category_id', 1)->where('bigthumbnail', 1)->first();


        $videoPostsmallthumbnail = DB::table('videoposts')
        ->join('categories', 'videoposts.category_id', 'categories.id')
        ->select('videoposts.*', 'categories.category_en')
        ->orderBy('id', 'desc')->where('videoposts.category_id', 1)->limit(3)->get();


        //second category display for video second front section
        $videoCategorySecond = DB::table('categories')->where('id', 6)->first();

        //second big thumbnail for second video section
         $videoPostBigThumbnailSecond = DB::table('videoposts')->where('category_id', 6)->where('bigthumbnail', 1)->first();

         //second video front section under IT category
         $videoPostSmallThumbnailSecond = DB::table('videoposts')
        ->join('categories', 'videoposts.category_id', 'categories.id')
        ->select('videoposts.*', 'categories.category_en')
        ->orderBy('id', 'desc')->where('videoposts.category_id', 6)->limit(3)->get();






        //photo gallery section
        //bigthumbnail
        $photobig = DB::table('photos')->where('type', 1)->first();

        //smallthumbnail
        $photosmall = DB::table('photos')->where('type', 0)->limit(6)->orderBy('id', 'desc')->get();

        $videobigtube = DB::table('videos')->where('type', 1)->first();
        $videosmalltube = DB::table('videos')->where('type', 0)->orderBy('id', 'desc')->limit(4)->get();




        //asidebar news
        $latest = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();

        $lastesvideo = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();

        $randomVideo  = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();


        // video section frontend
        $secvideobig = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->first();
        $secvideosmall = DB::table('videoposts')->orderBy('id', 'desc')->inRandomOrder()->limit(6)->get();



        // Call this dynamically or use
        // $_SERVER['REMOTE_ADDR'] but only works in server not in local
        $yourUserIpAddress = '66.102.0.0';

        $location = Location::get($yourUserIpAddress);








        return view(
            'main.home',
            compact(
                'category', 'subcategory', 'livetv',
                'social', 'seo', 'website', 'headline', 'notice',
                'firstsectionbig','firstsection', 'firstcategory',
                'firstcatpostbig', 'firstcatpostsmall',
                'secondcategory','secondcatpostbig','secondcatpostsmall',
                'videoCategoryFirst','videoPostBigThumbnail', 'videoPostsmallthumbnail',
                'videoCategorySecond','videoPostBigThumbnailSecond','videoPostSmallThumbnailSecond',
                'photobig','photosmall',
                'videobigtube','videosmalltube',
                'latest','lastesvideo','randomVideo',
                'secvideobig', 'secvideosmall',
                'location'
            )
        );
    }
}
