@extends('main.home_master')
@section('title', '')
@section('content')

    <!-- single-page-start -->

    <section class="single-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">{{ $posts->category_en }}</a></li>
                        <li><a href="#">{{ $posts->subcategory_en }}</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <header class="headline-header margin-bottom-10">
                        <h1 style="text-transform: capitalize" class="headline">{{ $posts->title_en }}</h1>
                    </header>


                    <div class="article-info margin-bottom-20">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul class="list-inline">


                                    <li></li>
                                    <li style="text-transform: capitalize;color:brown"><i class="fa fa-clock-o"></i>
                                        {{ Carbon\Carbon::parse($posts->updated_at)->diffForHumans() }} |
                                    </li>
                                    <li>Views </li>
                                    <li style="text-transform: capitalize;color:brown"><i class="fa fa-eye"></i>
                                        {{ $posts->view_count }}
                                    </li>


                                </ul>

                            </div>
                            <div class="col-md-6 col-sm-6 pull-right">
                                <ul class="social-nav">
                                    <li>
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ******** -->
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="single-news">
                        <img src="{{ asset($posts->image) }}" alt="{{ $posts->title_en }}" />

                        <h4 class="caption">Created By: {{ $posts->name }}</h4>
                        <br>
                        <div class="sharethis-inline-share-buttons"></div>

                        <div style="text-align: justify !important;line-height:1.9 !important">
                            {!! $posts->details_en !!}
                        </div>
                        <div class="sharethis-inline-share-buttons"></div>

                       <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0" nonce="6DseYzGj"></script>
                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
                    </div>
                    <!-- ********* -->
                    @php
                        $relatedpost = DB::table('posts')
                            ->where('category_id', $posts->category_id)
                            ->orderBy('id', 'desc')
                            ->limit(6)
                            ->get();
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="heading">Related News</h2>
                        </div>

                        @foreach ($relatedpost as $value)
                            <div class="col-md-4 col-sm-4">
                                <div class="top-news sng-border-btm">
                                    <a href="{{ URL::to('post/' . $value->slug) }}"><img src="{{ asset($value->image) }}"
                                            alt="Notebook"></a>
                                    <h4 class="heading-02"><a
                                            href="{{ URL::to('post/' . $value->slug) }}">{{ Str::limit($value->title_en, 25) }}</a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
                <div class="col-md-4 col-sm-4">
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}"
                                    alt="" /></div>
                        </div>
                    </div><!-- /.add-close -->
                    <div class="tab-header">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab"
                                    data-toggle="tab" aria-expanded="false"> Post</a></li>
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
                                            <li><a
                                                    href="{{ URL::to('post/' . $value->slug) }}">{{ $value->title_en }}</a>
                                            </li>
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
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}"
                                    alt="" /></div>
                        </div>
                    </div><!-- /.add-close -->
                </div>
            </div>
        </div>
    </section>
    <!-- single-page-ends -->


@endsection
