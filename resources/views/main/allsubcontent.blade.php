@extends('main.home_master')
@section('title', $subcategory_en)
@section('content')


    <!-- archive_page-start -->
    <section class="single_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="single_info">
                        <span style="text-transform: uppercase">
                            <i class="fa fa-home" aria-hidden="true"></i> /
                            {{ $subcategory_en }}
                        </span>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">

                    @if ($subcatvideo->isEmpty())
                        <div class="archive_post_sec_again">
                            <div class="row">

                                <div class="col-md-12 col-sm-12">
                                    <div class="archive_padding_again">
                                        <div class="archive_heading_01">
                                            <a href="#">{{ 'Video(s) are Currently not avaliable' }}</a>
                                        </div>
                                        <div class="archive_dtails">
                                            <p></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach ($subcatvideo as $value)
                            <div class="archive_post_sec_again">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5">
                                        <div class="archive_img_again">
                                            <a href="{{ URL::to('vlog/' . $value->slug) }}"><img
                                                    src="{{ asset($value->thumbnail) }}" alt="{{ $value->title }}"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="archive_padding_again">
                                            <div class="archive_heading_01">
                                                <a href="{{ URL::to('vlog/' . $value->slug) }}">{{ $value->title }}</a>
                                            </div>
                                            <div class="archive_dtails">
                                                <p></p>
                                            </div>
                                            <div class="dtails_btn"><a href="{{ URL::to('vlog/' . $value->slug) }}">View
                                                    <i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="col-md-12">
                            <div class="post-nav">
                                <ul class="pager">
                                    <li class="active"><span class="active">01</span></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#" title="next"><i class="fa fa-forward" aria-hidden="true"></i>
                                        </a></li>
                                    <li class="next"><a href="#"><i class="fa fa-fast-forward"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div> -->
                    @endif



                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <hr>
                            <h2 class="heading">Related Article</h2>
                            <hr>
                        </div>

                        @if ($subcatposts->isEmpty())
                            <div class="col-md-12 col-sm-4 text-center">
                                <div class="archive_heading_01">
                                    <a href="#">{{ 'Article(s) are Currently not avaliable' }}</a>
                                </div>
                            </div>
                        @else
                            @foreach ($subcatposts as $value)
                                <div class="col-md-4 col-sm-4">
                                    <div class="top-news sng-border-btm">

                                        <a href="{{ URL::to('post/' . $value->slug) }}"><img
                                                src="{{ asset($value->image) }}" alt="{{ $value->title_en }}"
                                                style="width: 400px;height:200px"></a>

                                        <h4 class="heading-02"><a
                                                href="{{ URL::to('post/' . $value->slug) }}">{{ Str::limit($value->title_en, 25) }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}"
                                    alt="" />
                            </div>
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
                                    alt="" />
                            </div>
                        </div>
                    </div><!-- /.add-close -->
                </div>
            </div>
        </div>
    </section>






@endsection
