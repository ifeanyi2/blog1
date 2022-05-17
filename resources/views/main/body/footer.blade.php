<!-- top-footer-start -->
    <section>
        <div class="container-fluid">
            <div class="top-footer">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="foot-logo">
                            <a href="/"><img src="{{ asset($seo->logo) }}" alt="logo"
                                style="width: 200px !important;height:100px" /></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4">
                        <div class="social">
                            <ul>
                                <li><a href="" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a>
                                </li>
                                <li><a href="" target="_blank" class="android"> <i class="fa fa-android"></i></a></li>
                                <li><a href="" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="apps-img">
                            <ul>
                                <li><a href="#"><img src="{{ asset('frontend/assets/img/apps-01.png') }}" alt="" /></a></li>
                                <li><a href="#"><img src="{{ asset('frontend/assets/img/apps-02.png') }}" alt="" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.top-footer-close -->
@php
    $web = DB::table('websitesettings')->first();
@endphp
    <!-- middle-footer-start -->
    <section class="middle-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="editor-one">
                        <h3>Company Address</h3>
                        <hr>
                        {{ $web->address }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="editor-two">
                     <h3>Contact Address</h3>
                     <hr>
                     <p>Email: {{ $web->email }}</p>
                     <p>Email: {{ $web->phone }}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="editor-three">
                      <p>We are here to make sure, your talent pays you.</p>
                      <p>We are here to make sure, your talent pays you.</p>
                      <p>We are here to make sure, your talent pays you.</p>
                      <p>We are here to make sure, your talent pays you.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.middle-footer-close -->

    <!-- bottom-footer-start -->
    <section class="bottom-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="copyright">
                        All rights reserved © @php
                            echo Date('Y');
                        @endphp Talpay.org
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="btm-foot-menu">
                        <ul>
                            <li><a href="#">About US</a></li>
                            <li><a href="#">Contact US</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
