@php
$horizontal = DB::table('ads')
    ->where('type', 1)
    ->first();
$vertical = DB::table('ads')
    ->where('type', 0)
    ->first();


@endphp

<!-- header-start -->
<div style="width: 100%;height:auto;background:skyblue">
    <div class="row text-center">
        <div class="col-xs-3"><a class="text-secondary text-small" href="/"><i class="fa fa-university fa-fw"></i>
                HOME</a></div>

        <div class="col-xs-3"><a class="text-secondary" href="/"><i class="fa fa-phone"></i> CONTACT US</a>
        </div>

        <div class="col-xs-3"><a href="/login" class="text-secondary"><i class="fa fa-user"></i> LOGIN</a>
        </div>
        <div class="col-xs-3"><a href="/register" class="text-secondary"><i class="fa fa-users"></i>
                REGISTER</a></div>
    </div>
</div>
<section class="hdr_section">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-4">
                <div class="header_logo">
                    <a href="/"><img src="{{ asset($seo->logo) }}" alt="logo" style="width: 200px !important;height:100px" /></a>
                </div>
            </div>
            <div class="col-xs-6 col-md-8 col-sm-8">
                <div id="menu-area" class="menu_area">
                    <div class="menu_bottom">
                        <nav role="navigation" class="navbar navbar-default mainmenu">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
                                    class="navbar-toggle">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collection of nav links and other content for toggling -->
                            <div id="navbarCollapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">


                                    @foreach ($category as $row)
                                        <li class="dropdown">
                                            <a href="{{ URL::to('cat/' . $row->category_en . '/' . $row->id) }}"
                                                style="text-transform: uppercase !important">


                                                {{ $row->category_en }}


                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu">

                                                @foreach ($subcategory as $row1)
                                                    @if ($row->id == $row1->category_id)
                                                        <li>
                                                            <a
                                                                href="{{ URL::to('subcat/' . $row1->subcategory_en . '/' . $row1->id) }}">
                                                                {{ $row1->subcategory_en }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </li>
                                    @endforeach


                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2 col-sm-12">
                <div class="header-icon">
                    <ul>
                        <li>
                            <div class="search-large-divice">
                                <div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal"
                                        data-target=".bd-example-modal-lg"><i class="fa fa-search"
                                            aria-hidden="true"></i></a>
                                    <div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog"
                                        aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <i class="fa fa-times-circle"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="custom-search-input">
                                                                <form>
                                                                    <div class="input-group">
                                                                        <input class="search form-control input-lg"
                                                                            placeholder="search" value="Type Here.."
                                                                            type="text">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-lg"
                                                                                type="button"> <i class="fa fa-search"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- social-start -->
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn-02"><i class="fa fa-thumbs-up"
                                        aria-hidden="true"></i></button>
                                <div class="dropdown-content">
                                    <a href="{{ $social->facebook }}"><i class="fa fa-facebook"
                                            aria-hidden="true"></i> Facebook</a>
                                    <a href="{{ $social->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i>
                                        Twitter</a>
                                    <a href="{{ $social->youtube }}"><i class="fa fa-youtube-play"
                                            aria-hidden="true"></i> Youtube</a>
                                    <a href="{{ $social->instagram }}"><i class="fa fa-instagram"
                                            aria-hidden="true"></i> Instagram</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.header-close -->


<!-- top-add-start -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <div class="top-add">
                    @if ($vertical == null)
                         <img src="{{ asset('frontend/assets/img/banner1.jpg') }}" style="width: 970px;height:90px" alt="" />
                    @else
                        <a href="{{ $vertical->link }}" class="li">
                            <img src="{{ asset($vertical->ads) }}" alt="">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section> <!-- /.top-add-close -->

<!-- date-start -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="date">
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $location->cityName }} </li>
                        <li>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            @php
                                $date = Carbon\Carbon::now();

                                echo $date->toRfc850String();
                            @endphp
                        </li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> Update 5 min ago </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section><!-- /.date-close -->

<!-- notice-start -->

<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 " style="background: crimson">

                Notice:
            </div>
            <div class="col-md-10 col-sm-9 scroll_02" style="background:#4d4d4d">
                <marquee style="text-transform: capitalize;" scrolldelay=250>
                    @foreach ($notice as $row)
                        {{ strip_tags($row->notice) }}
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">
                Breaking News:
            </div>
            <div class="col-md-10 col-sm-9 scroll_02">
                <marquee style="text-transform: capitalize">
                    @foreach ($headline as $row)
                        *{{ $row->title_en }}
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</section>
