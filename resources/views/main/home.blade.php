@php
$horizontal = DB::table('ads')
    ->where('type', 1)
    ->first();
$vertical = DB::table('ads')
    ->where('type', 0)
    ->first();
@endphp
@extends('main.home_master')
@section('title', 'Home')
@section('content')
    <style>
        #cover {
            background: #000 !important;
        }

    </style>

    <!-- 1st-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-lg-1"></div>
                        <div class="col-md-10 col-sm-10">
                            <div class="lead-news">
                                <div class="service-img"><a href="{{ URL::to('post/' . $firstsectionbig->slug) }}"><img
                                            src="{{ asset($firstsectionbig->image) }}" width="100%"
                                            alt="{{ $firstsectionbig->title_en }}"></a></div>
                                <div class="content">
                                    <h4 class="lead-heading-01"><a href="{{ URL::to('post/' . $firstsectionbig->slug) }}">
                                            {{ $firstsectionbig->title_en }}
                                        </a> </h4>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        @foreach ($firstsection as $row)
                            <div class="col-md-3 col-sm-3">
                                <div class="top-news">
                                    <a href="{{ URL::to('post/' . $row->slug) }}"><img src="{{ asset($row->image) }}"
                                            alt="Notebook" style="width: 150px"></a>
                                    <h4 class="heading-02"><a href="{{ URL::to('post/' . $row->slug) }}"
                                            style="text-transform: capitalize">
                                            {{ Str::limit($row->title_en, 20) }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach



                    </div>

                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="add">
                                @if ($vertical == null)
                                    <img src="{{ asset('frontend/assets/img/banner1.jpg') }}"
                                        style="width: 970px;height:90px" alt="" />
                                @else
                                    <a href="{{ $vertical->link }}" class="li">
                                        <img src="{{ asset($vertical->ads) }}" alt="">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div><!-- /.add-close -->

                    <!-- news-start -->
                    <div class="row">
                        @php
                            $catsection001 = DB::table('categories')->first();

                            $catsectionbigthumbnail001 = DB::table('posts')
                                ->where('bigthumbnail', 1)
                                ->where('category_id', $catsection001->id)
                                ->first();

                            $catsectionsmallthumbnail001 = DB::table('posts')
                                ->where('category_id', $catsection001->id)
                                ->limit(3)
                                ->get();
                        @endphp

                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title"><a href="#" style="text-transform: capitalize">
                                        {{ $catsection001->category_en }}
                                        <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                    </a>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="{{ URL::to('post/' . $catsectionbigthumbnail001->slug) }}"><img
                                                    src="{{ asset($catsectionbigthumbnail001->image) }}"
                                                    alt="Notebook"></a>
                                            <h4 class="heading-02"><a
                                                    href="{{ URL::to('post/' . $catsectionbigthumbnail001->slug) }}">

                                                    {{ Str::limit($catsectionbigthumbnail001->title_en, 40) }}

                                                </a> </h4>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($catsectionsmallthumbnail001 as $row)
                                            <div class="image-title">
                                                <a href="{{ URL::to('post/' . $row->slug) }}"><img
                                                        src="{{ asset($row->image) }}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="{{ URL::to('post/' . $row->slug) }}">

                                                        {{ Str::limit($row->title_en, 40) }}

                                                    </a> </h4>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @php
                                $catsection002 = DB::table('categories')
                                    ->skip(3)
                                    ->first();

                                $catsectionbigthumbnail002 = DB::table('posts')
                                    ->where('bigthumbnail', 1)
                                    ->where('category_id', $catsection002->id)
                                    ->first();

                                $catsectionsmallthumbnail002 = DB::table('posts')
                                    ->where('category_id', $catsection002->id)
                                    ->limit(3)
                                    ->get();
                            @endphp
                            <div class="bg-one">
                                <div class="cetagory-title"><a href="#">
                                        {{ $catsection002->category_en }}
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">


                                        <div class="top-news">
                                            <a href="{{ URL::to('post/' . $catsectionbigthumbnail002->slug) }}"><img
                                                    src="{{ asset($catsectionbigthumbnail002->image) }}"
                                                    alt="{{ $catsectionbigthumbnail002->title_en }}"></a>
                                            <h4 class="heading-02"><a
                                                    href="{{ URL::to('post/' . $catsectionbigthumbnail002->slug) }}">
                                                    {{ Str::limit($catsectionbigthumbnail002->title_en, 40) }}

                                                </a> </h4>
                                        </div>


                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($catsectionsmallthumbnail002 as $row)
                                            <div class="image-title">
                                                <a href="{{ URL::to('post/' . $row->slug) }}"><img
                                                        src="{{ asset($row->image) }}" alt="{{ $row->title_en }}"></a>
                                                <h4 class="heading-03"><a href="{{ URL::to('post/' . $row->slug) }}">
                                                        {{ Str::limit($row->title_en, 40) }}
                                                    </a> </h4>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}"
                                    alt="" /></div>
                        </div>
                    </div><!-- /.add-close -->

                    <!-- youtube-live-start -->
                    @if ($livetv->status == 1)
                        <div class="cetagory-title-03">Live TV</div>
                        <div class="photo" style="height: auto !important">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item"
                                style="margin-bottom:5px;">
                                {!! $livetv->embed_code !!}
                            </div>
                        </div><!-- /.youtube-live-close -->
                    @endif






                    <!-- facebook-page-start -->
                    <div class="cetagory-title-03">Facebook </div>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0"
                                        nonce="kqq3PJT1"></script>
                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="" data-width="270"
                        data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                        data-show-facepile="false">
                        <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/facebook">Meta</a></blockquote>
                    </div>
                    <!-- /.facebook-page-close -->

                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add">
                                <img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" />
                            </div>
                        </div>
                    </div><!-- /.add-close -->
                </div>
            </div>
        </div>
    </section><!-- /.1st-news-section-close -->

    <!-- 2nd-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        <div class="cetagory-title-02"><a style="text-transform:capitalize" href="#">
                                {{ $videoCategoryFirst->category_en }}
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">

                                    <img src="{{ asset($videoPostBigThumbnail->thumbnail) }}" width="100%"
                                        alt="{{ $videoPostBigThumbnail->title }}">

                                    <h4 class="heading-02"><a style="text-transform: capitalize;"
                                            href="{{ URL::to('vlog/' . $videoPostBigThumbnail->slug) }}">
                                            {{ $videoPostBigThumbnail->title }}
                                        </a> </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($videoPostsmallthumbnail as $vpstn)
                                    <div class="image-title">
                                        <a href="{{ URL::to('vlog/' . $vpstn->slug) }}">
                                            <img src="{{ asset($vpstn->thumbnail) }}" alt="{{ $vpstn->title }}"></a>
                                        <h4 class="heading-03"><a href="{{ URL::to('vlog/' . $vpstn->slug) }}"
                                                style="text-transform:capitalize;">{{ $vpstn->title }}</a>
                                        </h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        <div class="cetagory-title-02"><a href="#">{{ $videoCategorySecond->category_en }} <i
                                    class="fa fa-angle-right" aria-hidden="true"></i> </a></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{ URL::to('vlog/' . $videoPostBigThumbnailSecond->slug) }}"><img
                                            src="{{ asset($videoPostBigThumbnailSecond->thumbnail) }}"
                                            alt="{{ $videoPostBigThumbnailSecond->title }}"></a>
                                    <h4 class="heading-02"><a style="text-transform:capitalize;"
                                            href="{{ URL::to('vlog/' . $videoPostBigThumbnailSecond->slug) }}">{{ $videoPostBigThumbnailSecond->title }}</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($videoPostSmallThumbnailSecond as $small)
                                    <div class="image-title">
                                        <a href="{{ URL::to('vlog/' . $small->slug) }}"><img
                                                src="{{ asset($small->thumbnail) }}" alt="{{ $small->title }}"></a>
                                        <h4 class="heading-03"><a style="text-transform:capitalize;"
                                                href="{{ URL::to('vlog/' . $small->slug) }}">{{ $small->title }}</a>
                                        </h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ******* -->
            <div class="row">
                @php
                    $threecategory = DB::table('categories')
                        ->skip(3)
                        ->first();

                    $threecatpostbig = DB::table('posts')
                        ->where('category_id', $threecategory->id)
                        ->where('bigthumbnail', 1)
                        ->first();

                    $threecatpostsmall = DB::table('posts')
                        ->where('category_id', $threecategory->id)
                        ->where('bigthumbnail', null)
                        ->limit(4)
                        ->get();
                @endphp
                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        <div class="cetagory-title-02"><a href="#">{{ $threecategory->category_en }}<i
                                    class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus"
                                        aria-hidden="true"></i> All
                                    News </span></a></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{ URL::to('post/' . $threecatpostbig->slug) }}"><img
                                            src="{{ asset($threecatpostbig->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a
                                            href="{{ URL::to('post/' . $threecatpostbig->slug) }}">{!! $threecatpostbig->title_en !!}</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($threecatpostsmall as $value)
                                    <div class="image-title">
                                        <a href="{{ URL::to('post/' . $value->slug) }}"><img
                                                src="{{ asset($value->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a
                                                href="{{ URL::to('post/' . $value->slug) }}">{!! $value->title_en !!}</a>
                                        </h4>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    @php
                        $threecategoryvideo = DB::table('categories')->first();

                        $threecatpostbigvideo = DB::table('videoposts')
                            ->where('category_id', $threecategoryvideo->id)
                            ->where('bigthumbnail', 1)
                            ->first();

                        $threecatpostsmallvideo = DB::table('videoposts')
                            ->where('category_id', $threecategoryvideo->id)
                            ->where('bigthumbnail', null)
                            ->limit(3)
                            ->get();
                    @endphp
                    <div class="bg-one">
                        <div class="cetagory-title-02"><a href="#">{{ $threecategoryvideo->category_en }} </a>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{ URL::to('vlog/' . $threecatpostbigvideo->slug) }}"><img
                                            src="{{ asset($threecatpostbigvideo->thumbnail) }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a
                                            href="{{ URL::to('vlog/' . $threecatpostbigvideo->slug) }}">{!! $threecatpostbigvideo->title !!}</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($threecatpostsmallvideo as $value)
                                    <div class="image-title">
                                        <a href="{{ URL::to('vlog/' . $value->slug) }}"><img
                                                src="{{ asset($value->thumbnail) }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a
                                                href="{{ URL::to('vlog/' . $value->slug) }}">{!! $value->title !!}</a>
                                        </h4>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- add-start -->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="add"><img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="add"><img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
                </div>
            </div><!-- /.add-close -->

        </div>
    </section><!-- /.2nd-news-section-close -->

    <!-- 3rd-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <div class="cetagory-title-02"><a href="#">Latest Videos</a></div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                                <a href="{{ URL::to('vlog/' . $secvideobig->slug) }}"><img
                                        src="{{ asset($secvideobig->thumbnail) }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a style="text-transform: capitalize"
                                        href="{{ URL::to('vlog/' . $secvideobig->slug) }}">{{ $secvideobig->title }}</a>
                                </h4>
                            </div>
                        </div>
                        @foreach ($secvideosmall as $value)
                            <div class="col-md-4 col-sm-4">
                                <div class="image-title">
                                    <a href="{{ URL::to('vlog/' . $value->slug) }}"><img
                                            src="{{ asset($value->thumbnail) }}" alt="Notebook"></a>
                                    <h4 class="heading-03"><a style="text-transform: capitalize"
                                            href="{{ URL::to('vlog/' . $value->slug) }}">{{ $value->title }}</a>
                                    </h4>
                                </div>

                            </div>
                        @endforeach


                    </div>
                    <!-- ******* -->
                    <br />
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add">
                                <img src="{{ asset('frontend/assets/img/banner1.jpg') }}"
                                    style="width: 970px;height:90px" alt="" />
                            </div>
                        </div>
                    </div><!-- /.add-close -->


                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="tab-header">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21"
                                    role="tab" data-toggle="tab" aria-expanded="false"> Post</a></li>
                            <li role="presentation"><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab"
                                    aria-expanded="true"> Video</a></li>
                            <li role="presentation"><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab"
                                    aria-expanded="true"> Latest</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane in active" id="tab21">
                                <div class="news-titletab">
                                    <ul class="list-item">
                                        @foreach ($latest as $value)
                                            <li><a href="#">{{ $value->title_en }}</a> </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="tab22">
                                <div class="news-titletab">
                                    <ul class="list-item">
                                        @foreach ($lastesvideo as $value)
                                        @endforeach
                                        <li class="item"><a style="text-transform:capitalize"
                                                class="item" href="#">{{ $value->title }}</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab23">
                                <div class="news-titletab">
                                    <ul class="list-item">
                                        @foreach ($randomVideo as $value)
                                            <li class="item"><a class="list"
                                                    style="text-transform:capitalize" href="#">{{ $value->title }}</a>
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- news -->
                    <br><br><br><br><br>
                    <div class="cetagory-title-04"> Important Website</div>
                    <div class="">
                        @foreach ($website as $row)
                            <div class="news-title-02">
                                <h4 class="heading-03"><a href="{!! $row->website_link !!}"><i class="fa fa-check"
                                            aria-hidden="true"></i>
                                        {{ $row->website_name }} </a> </h4>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </section><!-- /.3rd-news-section-close -->









    <!-- gallery-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <div class="gallery_cetagory-title"> Photo Gallery </div>

                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="photo_screen">
                                <div class="myPhotos" style="width:100%">
                                    <img src="{{ asset($photobig->photo) }}" alt="Avatar">
                                    <div class="heading-03">{!! $photobig->title !!}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="photo_list_bg">
                                @foreach ($photosmall as $value)
                                    <div class="photo_img photo_border active">
                                        <img src="{{ asset($value->photo) }}" alt="image" onclick="currentDiv(1)">
                                        <div class="heading-03">
                                            {!! $value->title !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!--=======================================
                                                        Video Gallery clickable jquary  start
                                                    ========================================-->

                    <script>
                        var slideIndex = 1;
                        showDivs(slideIndex);

                        function plusDivs(n) {
                            showDivs(slideIndex += n);
                        }

                        function currentDiv(n) {
                            showDivs(slideIndex = n);
                        }

                        function showDivs(n) {
                            var i;
                            var x = document.getElementsByClassName("myPhotos");
                            var dots = document.getElementsByClassName("demo");
                            if (n > x.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = x.length
                            }
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                            }
                            x[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " w3-opacity-off";
                        }
                    </script>

                    <!--=======================================
                                                        Video Gallery clickable  jquary  close
                                                    =========================================-->

                </div>
                <div class="col-md-4 col-sm-5">
                    <div class="gallery_cetagory-title"> Video Gallery </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        <iframe width="853" height="480"
                                            src="https://www.youtube.com/embed/{{ $videobigtube->embed_code }}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="gallery_sec owl-carousel">
                                @foreach ($videosmalltube as $value)
                                    <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                            <iframe width="853" height="480"
                                                src="https://www.youtube.com/embed/{{ $value->embed_code }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="heading-03">
                                            <div class="content_padding">
                                                {!! $value->title !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                            showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                            showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                            var i;
                            var x = document.getElementsByClassName("myVideos");
                            var dots = document.getElementsByClassName("demo");
                            if (n > x.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = x.length
                            }
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                            }
                            x[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " w3-opacity-off";
                        }
                    </script>

                </div>
            </div>
        </div>
    </section><!-- /.gallery-section-close -->
@endsection
