<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\ExtraController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\VidepostController;
use App\Http\Controllers\Backend\WebsitesController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\WebsiteSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('main.home');
// });
// front end
Route::get('/', [FrontendController::class, 'Index']);

//multi lang router
Route::get('/language/hindi', [ExtraController::class, 'Hindi'])->name('lang.hindi');
Route::get('/language/english', [ExtraController::class, 'English'])->name('lang.english');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('admin.index');
})->name('dashboard');

//Admin logout
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//admin category routes
Route::get('/categories', [CategoryController::class, 'Index'])->name('categories');

//goto add new category form
Route::get('/add/categories', [CategoryController::class, 'AddCategory'])->name('add.category');

//category form action redirect to save from inputs
Route::post('/store/categories', [CategoryController::class, 'StoreCategory'])->name('store.category');

//edit category
Route::get('/edit/categories/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');

//update category
Route::post('/update/categories/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');

//delete category
Route::get('/delete/categories/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');



// ADMIN SUBCATEGORIES
Route::get('/subcategories', [SubCategoryController::class, 'Index'])->name('subcategories');

//subcategory add form
Route::get('/add/subcategories', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');

//store subcategory
Route::post('/store/subcategories', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');

//edit subcategory
Route::get('/edit/subcategories/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');

//update subcategory
Route::post('/update/subcategories/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');

//delete subcategory
Route::get('/delete/subcategories/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');



// ADMIN DISTRICTS SECTION
Route::get('/districts', [DistrictController::class, 'Index'])->name('districts');

//districts create form
Route::get('/add/districts', [DistrictController::class, 'AddDistricts'])->name('add.districts');

//save new district
Route::post('/store/districts', [DistrictController::class, 'StoreDistricts'])->name('store.district');

//edit districts
Route::get('/edit/districts/{id}', [DistrictController::class, 'EditDistricts'])->name('edit.districts');

//update district
Route::post('/update/districts/{id}', [DistrictController::class, 'UpdateDistricts'])->name('update.district');

//delete districts
Route::get('/delete/districts/{id}', [DistrictController::class, 'DeleteDistricts'])->name('delete.districts');


//sub district section
Route::get('/subdistricts', [SubDistrictController::class, 'Index'])->name('subdistricts');

//form for new sub-district
Route::get('/add/subdistricts', [SubDistrictController::class, 'AddSubDestricts'])->name('add.subdistricts');

//save new subdistrict
Route::post('/store/subdistricts', [SubDistrictController::class, 'StoreSubDistricts'])->name('store.subdistricts');

//edit sub-district
Route::get('/edit/subdistricts/{id}', [SubDistrictController::class, 'EditSubDestricts'])->name('edit.subdistricts');

//update sub-district
Route::post('/update/subdistricts/{id}', [SubDistrictController::class, 'UpdateSubDestricts'])->name('update.subdistricts');

//delete sub-district
Route::get('/delete/subdistricts/{id}', [SubDistrictController::class, 'DeleteSubDestricts'])->name('delete.subdistricts');



// ADMIN ADD POST SECTION
Route::get('/all/post', [PostController::class, 'Index'])->name('all.post');
Route::get('/create/post', [PostController::class, 'CreatePost'])->name('create.post');
Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('edit.post');
Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('delete.post');

//store post
Route::post('/store/post', [PostController::class, 'StorePost'])->name('store.post');
Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('update.post');


// json fetch data for create post
Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);





//social setting
Route::get('/social/setting', [SettingController::class, 'SocialSetting'])->name('social.setting');

Route::post('/update/social/{id}', [SettingController::class, 'SocialUpdate'])->name('update.social');


//SEO
Route::get('/seo/setting', [SettingController::class, 'SeoSetting'])->name('seo.setting');
Route::post('/update/seo/{id}', [SettingController::class, 'SeoUpdate'])->name('update.seo');



//LIVE TV SETTING
Route::get('/livetv/setting', [SettingController::class, 'LiveTvSetting'])->name('livetv.setting');

Route::post('/update/livetv/{id}', [SettingController::class, 'UpdateLiveTvUpdate'])->name('update.livetv');

Route::get('/deactivate/livetv/{id}', [SettingController::class, 'DeactivateLiveTvSetting'])->name('deactivate.livetv');

Route::get('/active/livetv/{id}', [SettingController::class, 'ActiveLiveTvSetting'])->name('active.livetv');


//NOTICE SETTING
Route::get('/notice/setting', [SettingController::class, 'NoticeSetting'])->name('notice.setting');
Route::post('/update/notice/{id}', [SettingController::class, 'UpdateNoticeUpdate'])->name('update.notice');

Route::get('/deactivate/notice/{id}', [SettingController::class, 'DeactivateNoticeSetting'])->name('deactivate.notice');

Route::get('/active/notice/{id}', [SettingController::class, 'ActiveNoticeSetting'])->name('active.notice');





//website links
Route::get('/all/websites', [WebsitesController::class, 'Index'])->name('all.websites');
Route::get('/create/website', [WebsitesController::class, 'CreateWebsite'])->name('create.website');
Route::get('/edit/website/{id}', [WebsitesController::class, 'EditWebsite'])->name('edit.website');


Route::get('/delete/website/{id}', [WebsitesController::class, 'DeleteWebsite'])->name('delete.website');


Route::post('/store/website', [WebsitesController::class, 'StoreWebsite'])->name('store.website');


Route::post('/update/website/{id}', [WebsitesController::class, 'UpdateWebsite'])->name('update.website');


//PHOTO GALLERY
Route::get('photo/gallery', [GalleryController::class, 'PhotoGallery'])->name('photo.gallery');
Route::get('add/photo', [GalleryController::class, 'AddPhoto'])->name('add.photo');

Route::post('/store/photo', [GalleryController::class, 'StorePhoto'])->name('store.photo');

Route::post('/update/photo/{id}', [GalleryController::class, 'UpdatePhoto'])->name('update.photo');

Route::get('/edit/photo/{id}', [GalleryController::class, 'EditPhoto'])->name('edit.photo');
Route::get('/delete/photo/{id}', [GalleryController::class, 'DeletePhoto'])->name('delete.photo');


//VIDEO GALLERY
Route::get('video/gallery', [GalleryController::class, 'VideoGallery'])->name('video.gallery');
Route::get('add/video', [GalleryController::class, 'AddVideo'])->name('add.video');
Route::post('store/video', [GalleryController::class, 'Store1Video'])->name('store1.video');
Route::get('edit/video/{id}', [GalleryController::class, 'EditVideo'])->name('edit.video');
Route::post('update/video/{id}', [GalleryController::class, 'UpdateVideo'])->name('update.video')
;
Route::get('delete/video/{id}', [GalleryController::class, 'DeleteVideo'])->name('delete.video');



//create admin video manager section
Route::get('/create/videos', [VidepostController::class, 'CreateVideo'])->name('create.video');
Route::get('/all/videos', [VidepostController::class, 'AllVideo'])->name('all.video');
Route::post('/store/videos', [VidepostController::class, 'StoreVideo'])->name('store.video');
Route::get('/edit/videos/{id}', [VidepostController::class, 'EditVideos'])->name('edit.videos');
Route::post('/update/videos/{id}', [VidepostController::class, 'UpdateVideos'])->name('update.videos');
Route::get('/delete/videos/{id}', [VidepostController::class, 'DeleteVideos'])->name('delete.videos');


//ads backend section route
Route::get('ads/list', [AdsController::class, 'Index'])->name('list.ads');
Route::get('add/ads', [AdsController::class, 'AddNewAds'])->name('add.ads');
Route::get('edit/ads/{id}', [AdsController::class, 'EditNewAds'])->name('edit.ads');
Route::get('delete/ads/{id}', [AdsController::class, 'DeleteAds'])->name('delete.ads');
Route::post('store/ads', [AdsController::class, 'StoreAds'])->name('store.ads');
Route::post('update/ads/{id}', [AdsController::class, 'UpdateAds'])->name('update.ads');





//single post view
Route::get('/post/{slug}', [ExtraController::class, 'SinglePost']);

//single video post view
Route::get('/vlog/{slug}', [ExtraController::class, 'SinglePostVideo']);

//vote and like video post route
Route::get('/vote/{ip}/{post_id}', [ExtraController::class, 'LikeOrVote'])->name('vote.video');


//fetch value by category name and id
Route::get('/cat/{category_en}/{id}', [ExtraController::class, 'CatPostView']);
Route::get('/subcat/{subcategory_en}/{id}', [ExtraController::class, 'SubCatPostView']);




//users role route
Route::get('/add/user', [RoleController::class, 'AddUser'])->name('add.user');
Route::get('/all/users', [RoleController::class, 'AllUser'])->name('all.users');
Route::get('/edit/user/{id}', [RoleController::class, 'EditUser'])->name('edit.user');
Route::get('/delete/user/{id}', [RoleController::class, 'DeleteUser'])->name('delete.user');
Route::post('/save/user', [RoleController::class, 'SaveUser'])->name('save.user');
Route::post('/update/user/{id}', [RoleController::class, 'UpdateUser'])->name('update.user');


// all website setting
Route::get('/website/setting', [WebsiteSettingController::class, 'WebSiteSetting'])->name('website.setting');

Route::post('/update/setting/{id}', [WebsiteSettingController::class, 'UpdateWebSiteSetting'])->name('update.websitesetting');






Route::get('/user/settings', [AdminController::class, 'AccountSetting'])->name('account.setting');
Route::get('/user/edit', [AdminController::class, 'EditUserProfile'])->name('userprofile.edit');
Route::post('/save/profile', [AdminController::class, 'Saveprofile'])->name('save.profile');



//change password route
Route::get('change/password', [AdminController::class, 'ChangePassword'])->name('change.password');

Route::post('update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');


