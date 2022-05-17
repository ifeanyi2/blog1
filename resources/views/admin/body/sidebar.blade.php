@php
    $seo = DB::table('seo')->first();

    $editData = DB::table('users')->where('id', Auth::id())->first();
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center          justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset($seo->logo) }}"
                alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset($seo->logo) }}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ (!empty($editData->image)) ? url('upload/user_images/'.$editData->image) : url('upload/no_image.png') }}"
                            alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="{{ route('account.setting') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('change.password') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.logout') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Logout</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        @if (Auth::user()->type == 1)
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @else
        @endif

        @if (Auth::user()->category == 1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories') }}"><i
                                class="mdi mdi-plus"></i> Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('subcategories') }}"><i
                                class="mdi mdi-plus"></i> Sub Category</a></li>
                </ul>
            </div>
          </li>
        @else

        @endif


        @if (Auth::user()->district == 1)
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <span class="menu-icon">
                        <i class="mdi mdi-security"></i>
                    </span>
                    <span class="menu-title">Districts</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('districts') }}"><i
                                    class="mdi mdi-plus"></i> Districts</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('subdistricts') }}"><i
                                    class="mdi mdi-plus"></i> Sub District </a></li>
                    </ul>
                </div>
            </li>
         @else

        @endif



        @if (Auth::user()->video_post == 1)
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#video" aria-expanded="false" aria-controls="video">
                    <span class="menu-icon">
                        <i class="mdi mdi-play-circle"></i>
                    </span>
                    <span class="menu-title">Video Posts</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="video">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('create.video') }}"><i
                                    class="mdi mdi-plus"></i> Add Video</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('all.video') }}"><i
                                    class="mdi mdi-plus"></i> View All Video Posts </a></li>
                    </ul>
                </div>
            </li>
        @else

        @endif


         @if (Auth::user()->posts == 1)
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#post" aria-expanded="false" aria-controls="post">
                <span class="menu-icon">
                    <i class="mdi mdi-comment"></i>
                </span>
                <span class="menu-title">Posts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="post">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('create.post') }}"><i
                                class="mdi mdi-plus"></i> Add Post</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('all.post') }}"><i
                                class="mdi mdi-plus"></i> View Posts </a></li>
                </ul>
            </div>
        </li>
        @else
        @endif

         @if (Auth::user()->setting == 1)
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="false"
                aria-controls="setting">
                <span class="menu-icon">
                    <i class="mdi mdi-settings"></i>
                </span>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="setting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('social.setting') }}"><i
                                class="mdi mdi-plus"></i> Social Setting</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('seo.setting') }}"><i class="mdi mdi-plus"></i> SEO Setting </a></li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('livetv.setting') }}"><i class="mdi mdi-plus"></i> Live TV </a></li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('notice.setting') }}"><i class="mdi mdi-plus"></i> Notice </a></li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('website.setting') }}"><i
                                class="mdi mdi-plus"></i> Website Settings </a></li>
                </ul>
            </div>
        </li>
        @else
        @endif


         @if (Auth::user()->website == 1)
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#website" aria-expanded="false"
                aria-controls="website">
                <span class="menu-icon">
                    <i class="mdi mdi-cloud-sync"></i>
                </span>
                <span class="menu-title">Websites</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="website">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('all.websites') }}"><i
                                class="mdi mdi-plus"></i> All Websites</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('create.website') }}"><i
                                class="mdi mdi-plus"></i> Create Website </a></li>
                </ul>
            </div>
        </li>
        @else
        @endif



         @if (Auth::user()->gallery == 1)
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#photo" aria-expanded="false" aria-controls="photo">
                <span class="menu-icon">
                    <i class="mdi mdi-format-indent-increase"></i>
                </span>
                <span class="menu-title">Gallery</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="photo">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('photo.gallery') }}"><i class="mdi mdi-plus"></i> Photo Gallery</a></li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('video.gallery') }}"><i class="mdi mdi-plus"></i> Video Gallery </a></li>
                </ul>
            </div>
        </li>
        @else
        @endif

         @if (Auth::user()->ads == 1)
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#advert" aria-expanded="false" aria-controls="advert">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Advertisement</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="advert">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('list.ads') }}"><i class="mdi mdi-plus"></i> ADS List</a></li>
                </ul>
            </div>
        </li>
        @else
        @endif

         @if (Auth::user()->role == 1)
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                <span class="menu-icon">
                    <i class="mdi mdi-users"></i>
                </span>
                <span class="menu-title">User Roles</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add.user') }}"><i class="mdi mdi-plus"></i> Add User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('all.users') }}"><i class="mdi mdi-plus"></i> All Users</a></li>
                </ul>
            </div>
        </li>
        @else
        @endif



    </ul>
</nav>
