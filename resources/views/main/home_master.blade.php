<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keyword" content="{{ $seo->meta_keyword }}">
    <meta name="description" content="{{ html_entity_decode($seo->meta_description) }}">
    <meta name="google-verification" content="{{ $seo->google_verification }}">


    <meta property="og:title" content="{{ $seo->site_name }}">
    <meta property="og:type" content="{{ $seo->site_name }}" />
    <meta property="og:image" content="{{ asset($seo->logo) }}">
    <meta property="og:url" content="{{ $seo->site_url }}">
    <meta name="twitter:card" content="summary_large_image">

    <!--  Non-Essential, But Recommended -->
    <meta property="og:description" content="{{ $seo->meta_description }}">
    <meta property="og:site_name" content="{{ $seo->site_name }}">
    <meta name="twitter:image:alt" content="{{ $seo->site_name }}">

    <!--  Non-Essential, But Required for Analytics -->
    <meta property="fb:app_id" content="your_app_id" />
    <meta name="twitter:site" content="@website-username">

    <title>{{ $seo->meta_title }}</title>
    <link rel="shortcut icon" href="{{ asset($seo->favicons) }}" type="image/x-icon">


    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lity.css') }}">


<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=62477a4281dd2a0019a6aef3&product=inline-share-buttons" async="async"></script>

</head>

<body style="overflow-x:hidden">
    @include('main.body.header')


    @yield('content')


    @include('main.body.footer')








    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('js/lity.js') }}"></script>

</body>

</html>
