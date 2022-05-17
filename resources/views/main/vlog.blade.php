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
                        <li><a href="#">{{ $video->category_en }}</a></li>
                        <li><a href="#">{{ $video->subcategory_en }}</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <header class="headline-header margin-bottom-10">
                        <h1 class="headline" style="text-transform: capitalize">{{ $video->title }}</h1>
                    </header>


                    <div class="article-info margin-bottom-20">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul class="list-inline">

                                    <li></li>
                                    <li style="text-transform: capitalize;color:brown"><i class="fa fa-clock-o"></i>
                                        {{ Carbon\Carbon::parse($video->updated_at)->diffForHumans() }} |
                                    </li>
                                    <li>Views </li>
                                    <li style="text-transform: capitalize;color:brown"><i class="fa fa-eye"></i>
                                        {{ $video->view_count }}
                                    </li>
                                </ul>

                            </div>
                            <div class="col-md-6 col-sm-6 pull-right">
                                <ul class="social-nav">
                        <li><div class="sharethis-inline-share-buttons"></div>

                        </li>


                       </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ******** -->

            <div class="row">
                <div class="col-md-8 col-sm-8 text-center">
                    <div class="single-news">
                        <video src="{{ asset($video->video) }}" poster="{{ asset($video->thumbnail) }}" controls
                            style="width:60vw;height:60vh"></video>
                        <h4 class="caption">Created By: {{ $video->name }}</h4>
                        <h4 class="caption">


                            @php
                                $checkip = DB::table('uservoteip')
                                    ->where('post_id', $video->id)
                                    ->first();
                                //dd($video->id);
                            @endphp

                            @if (@$checkip->status == 1)
                                <div class="text-success">

                                   <p>


                                  @if ($video->category_en === 'Competition')
                                     {{ 'Voted!' }}
                                  @else
                                      {{ 'Like!' }}
                                  @endif


                                       <i class="fa fa-check"></i></p><br><br>
                                    <button class="btn btn-success btn-lg">


                                  @if ($video->category_en === 'Competition')
                                     {{ 'Number of Votes: ' }}
                                  @else
                                      {{ 'Number of Likes: ' }}
                                  @endif

                                        <span class="badge badge-light"> {{ $video->likes }}</span></button>
                                </div>
                            @else
                               <p> <a class="btn btn-primary"
                                    href="{{ route('vote.video', ['ip' => $_SERVER['REMOTE_ADDR'], 'post_id' => $video->id]) }}">

                                  @if ($video->category_en === 'Competition')
                                     {{ 'Vote' }}
                                  @else
                                      {{ 'Like' }}
                                  @endif

                                    <i class="fa fa-thumbs-up"></i><br>

                                </a></p>
                                 <Button class="btn btn-lg btn-success">
                                      @if ($video->category_en === 'Competition')
                                     {{ 'Number of votes: ' }}
                                  @else
                                      {{ 'Number of likes: ' }}
                                  @endif


                                    <span class="badge badge-light">{{ $video->likes }}</span></button>
                            @endif


                        </h4>
                        <hr>
                        <div class="paragraph" style="text-align: justify;line-height:1.9;text-transform:capitalize">
                            <p>
                                {!! $video->description_en !!}
                            </p>
                        </div>
                        <div class="sharethis-inline-share-buttons"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0" nonce="6DseYzGj"></script>
                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
                    </div>
                    <hr>
                    <!-- ********* -->
                    @php
                        $relatedvideopost = DB::table('videoposts')
                            ->where('category_id', $video->category_id)
                            ->orderBy('id', 'desc')
                            ->limit(6)
                            ->get();
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="heading">Related News</h2>
                        </div>
                        @foreach ($relatedvideopost as $value)
                            <div class="col-md-4 col-sm-4">
                                <div class="top-news sng-border-btm">

                                    <a href="{{ URL::to('vlog/'.$value->slug) }}"><img src="{{ asset($value->thumbnail) }}" alt="Notebook" style="width: 400px;height:200px"></a>

                                    <h4 class="heading-02"><a href="{{ URL::to('vlog/'.$value->slug) }}">{{  Str::limit($value->title, 25)}}</a>
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
                            <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" /></div>
                        </div>
                    </div><!-- /.add-close -->
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
                                        @foreach($latest as $value)
                                            <li><a href="{{ URL::to('post/'.$value->slug) }}">{{ $value->title_en }}</a> </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="tab22">
                                <div class="news-titletab">
                                    <ul class="list-item">
                                        @foreach($lastesvideo as $value)

                                        @endforeach
                                        <li class="item"><a style="text-transform:capitalize" class="item" href="#">{{ $value->title }}</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab23">
                                <div class="news-titletab">
                                    <ul class="list-item">
                                        @foreach($randomVideo as $value)
                                             <li class="item"><a class="list" style="text-transform:capitalize" href="#">{{ $value->title }}</a> </li>
                                        @endforeach

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" /></div>
                        </div>
                    </div><!-- /.add-close -->
                </div>
            </div>
        </div>
    </section>
    <!-- single-page-ends -->
@endsection
