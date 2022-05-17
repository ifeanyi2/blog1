<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //social setting methods
    public function SocialSetting(){
        $social = DB::table('socials')->first();
        return view('backend.settings.social', compact('social'));
    }

    public function SocialUpdate(Request $request, $id){
         $validated = $request->validate([
            'facebook' => 'required|unique:socials|max:100|url',
            'twitter' => 'required|unique:socials|max:100|url',
            'youtube' => 'required|unique:socials|max:100|url',
            'linkedin' => 'required|unique:socials|max:100|url',
            'instagram' => 'required|unique:socials|max:100|url',
        ]);

        $data = [];
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;

        $notification = [
            'message' => 'Social links updated successfully!',
            'alert-type' => 'success'
        ];

        DB::table('socials')->where('id', $id)->update($data);
        return redirect()->route('social.setting')->with($notification);
    }

    public function SeoSetting(){
        $seo = DB::table('seo')->first();
        return view('backend.settings.seo', compact('seo'));
    }

    public function SeoUpdate(Request $request, $id){
        $validated = $request->validate([
            'meta_author' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'google_analytics' => 'required',
            'google_verification' => 'required',
            'alexa_analytics' => 'required',
            'site_url' => 'required|url',
            'site_name' => 'required',
            'logo' => 'file|mimes:jpg,jeg,png,svg,ico,gif|max:10000',
            'favicons' => 'file|mimes:jpg,jeg,png,svg,ico,gif|max:10000',
        ]);

        $data = [];
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;
        $data['site_url'] = $request->site_url;
        $data['site_name'] = $request->site_name;

        $logo = $request->logo;
        if ($logo) {
            $logo_one = uniqid() . '.' . $logo->getClientOriginalExtension();

            Image::make($logo)->resize(250, 250)->save('image/seo/' . $logo_one);
            $data['logo'] = 'image/seo/' . $logo_one;
        }
        $favicons = $request->favicons;
        if ($favicons) {
            $favicons_one = uniqid() . '.' . $favicons->getClientOriginalExtension();

            Image::make($favicons)->resize(200, 200)->save('image/seo/' . $favicons_one);
            $data['favicons'] = 'image/seo/' . $favicons_one;
        }

        $notification = [
            'message' => 'SEO Data updated successfully!',
            'alert-type' => 'success'
        ];

        DB::table('seo')->where('id', $id)->update($data);
        return redirect()->route('seo.setting')->with($notification);
    }

    public function LiveTvSetting(){
        $livetv = DB::table('livetv')->first();
        return view('backend.settings.livetv', compact('livetv'));
    }

    public function UpdateLiveTvUpdate(Request $request, $id){
         $validated = $request->validate([
            'embed_code' => 'required|unique:livetv',
        ]);

        $data = [];
        $data['embed_code'] = $request->embed_code;
        $data['user_id'] = Auth::id();

        $notification = [
            'message' => 'Live Tv Setting Updated Successfully!',
            'alert-type' => 'success'
        ];

        DB::table('livetv')->where('id', $id)->update($data);
        return redirect()->route('livetv.setting')->with($notification);

    }

    public function ActiveLiveTvSetting($id){
        DB::table('livetv')->where('id', $id)->update(['status' => 1]);
        $notification = [
            'message' => 'Live Tv Activated!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
    public function DeactivateLiveTvSetting($id){
        DB::table('livetv')->where('id', $id)->update(['status' => 0]);
        $notification = [
            'message' => 'Live Tv Deactivated!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function NoticeSetting(){
        $notice = DB::table('notice')->first();
        return view('backend.settings.notice', compact('notice'));
    }

    public function UpdateNoticeUpdate(Request $request, $id){
         $validated = $request->validate([
            'notice' => 'required|unique:notice',
        ]);

        $data = [];
        $data['notice'] = $request->notice;

        $notification = [
            'message' => 'Notice Updated Successfully!',
            'alert-type' => 'success'
        ];

        DB::table('notice')->where('id', $id)->update($data);
        return redirect()->route('notice.setting')->with($notification);
    }

    public function DeactivateNoticeSetting($id){
         DB::table('notice')->where('id', $id)->update(['status' => 0]);
        $notification = [
            'message' => 'Notice Deactivated!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function ActiveNoticeSetting($id){
         DB::table('notice')->where('id', $id)->update(['status' => 1]);
        $notification = [
            'message' => 'Notice Activated!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
