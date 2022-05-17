@extends('admin.admin_master')
@section('title', 'Dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">
        @php
            $category = DB::table('categories')->get();
            $subcategory = DB::table('subcategories')->get();
            $posts = DB::table('posts')->get();
            $videos = DB::table('videoposts')->get();
            $users = DB::table('users')->get();
            $ads = DB::table('ads')->get();
            $competitionPosts = DB::table('posts')
                ->join('categories', 'posts.category_id', 'categories.id')
                ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
                ->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();
            $competitionVideo = DB::table('videoposts')
                ->join('categories', 'videoposts.category_id', 'categories.id')
                ->join('subcategories', 'videoposts.subcategory_id', 'subcategories.id')
                ->select('videoposts.*', 'categories.category_en', 'subcategories.subcategory_en')
                ->where('categories.category_en', 'competition')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();
            $allVideo = DB::table('videoposts')
                ->join('categories', 'videoposts.category_id', 'categories.id')
                ->join('subcategories', 'videoposts.subcategory_id', 'subcategories.id')
                ->select('videoposts.*', 'categories.category_en', 'subcategories.subcategory_en')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();
            //dd($competitionPosts);
        @endphp
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($category) }}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">Categories</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Categories</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($subcategory) }}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">Sub-Categories</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">SubCategories</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($posts) }}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">Posts</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Posts</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($videos) }}</h3>
                                    <p class="text-danger ml-2 mb-0 font-weight-medium">Videos</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Video Logs</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($users) }}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">Total Users</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Users</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($ads) }}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">Total Ads</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">ADS</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <h1>Latest Posts</h1>
                    <table class="table table-bordered">
                        <caption>ARTICLE DATA</caption>
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Post Title </th>
                                <th> Image </th>
                                <th> Category </th>
                                <th> View Counts </th>
                                <th> Created At </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($competitionPosts as $row)
                                <tr>
                                    <td>{{ $n++ }}</td>
                                    <td title="{{ $row->title_en }}">{{ Str::limit($row->title_en, 6) }}</td>

                                    <td>
                                        <a href="{{ asset($row->image) }}" data-lity>
                                            <img src="{{ asset($row->image) }}" alt="" class="img-responsive"
                                                width="200">
                                        </a>
                                    </td>
                                    <td>{{ $row->category_en }}</td>
                                    <td>{{ $row->view_count }}</td>
                                    <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('edit.videos', $row->id) }}" class="btn btn-primary">Edit</a>
                                        <a onclick="return confirm('Are you sure to delete ?')"
                                            href="{{ route('delete.videos', $row->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <h1>Latest VLOG(COMPETITION)</h1>
                    <table class="table table-bordered">
                        <caption>ARTICLE DATA</caption>
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Post Title </th>
                                <th> Thumbnail </th>
                                <th> Video </th>
                                <th> Category </th>
                                <th> View Counts </th>
                                <th> Votes </th>
                                <th> Created At </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($competitionVideo as $row)
                                <tr>
                                    <td>{{ $n++ }}</td>
                                    <td title="{{ $row->title }}">{{ Str::limit($row->title, 6) }}</td>

                                    <td>
                                        <a href="{{ asset($row->thumbnail) }}" data-lity>
                                            <img src="{{ asset($row->thumbnail) }}" alt="" class="img-responsive"
                                                width="200">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ asset($row->video) }}" data-lity>
                                            <video src="{{ asset($row->video) }}"  class="img-responsive"
                                                style="width:100px"></video>
                                        </a>
                                    </td>
                                    <td>{{ $row->category_en }}</td>
                                    <td>{{ $row->view_count }}</td>
                                    <td>{{ $row->likes }}</td>
                                    <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('edit.videos', $row->id) }}" class="btn btn-primary">Edit</a>
                                        <a onclick="return confirm('Are you sure to delete ?')"
                                            href="{{ route('delete.videos', $row->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <h1>Latest VLOG(All)</h1>
                    <table class="table table-bordered">
                        <caption>ALl video</caption>
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Post Title </th>
                                <th> thumbnail </th>
                                <th> Video </th>
                                <th> Category </th>
                                <th> View Counts </th>
                                <th> Votes </th>
                                <th> Created At </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($allVideo as $row)
                                <tr>
                                    <td>{{ $n++ }}</td>
                                    <td title="{{ $row->title }}">{{ Str::limit($row->title, 6) }}</td>

                                    <td>
                                        <a href="{{ asset($row->thumbnail) }}" data-lity>
                                            <img src="{{ asset($row->thumbnail) }}" alt="" class="img-responsive"
                                                width="200">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ asset($row->video) }}" data-lity>
                                            <video src="{{ asset($row->video) }}"  class="img-responsive"
                                                style="width:100px"></video>
                                        </a>
                                    </td>
                                    <td>{{ $row->category_en }}</td>
                                    <td>{{ $row->view_count }}</td>
                                    <td>{{ $row->likes }}</td>
                                    <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('edit.videos', $row->id) }}" class="btn btn-primary">Edit</a>
                                        <a onclick="return confirm('Are you sure to delete ?')"
                                            href="{{ route('delete.videos', $row->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
