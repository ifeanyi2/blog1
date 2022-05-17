@extends('admin.admin_master')
@section('title', 'SEO Setting')
@section('admin')
    <!--suppress ALL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js">
    </script>
    <style type="text/css">
        .bootstrap-tagsinput {
            width: 100%;
        }

        .label-info {
            background-color: #17a2b8;

        }

        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out,
                border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

    </style>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All SEO Settings</h4>
                        <form class="forms-sample" method="POST" action="{{ route('update.seo', $seo->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Meta Author</label>
                                <input type="text" class="form-control" name="meta_author"
                                    value="{{ $seo->meta_author }}">
                                @error('meta_author')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $seo->meta_title }}">
                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Site URL</label>
                                <input type="text" class="form-control" name="site_url"
                                       value="{{ $seo->site_url }}">
                                @error('site_url')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Site Name</label>
                                <input type="text" class="form-control" name="site_name"
                                       value="{{ $seo->site_name }}">
                                @error('site_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card-body">
                                <label>Meta Keywords :</label>
                                <input type="text" data-role="tagsinput" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}">
                                 @error('meta_keyword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="summernote">Meta Description</label>
                                <textarea class="form-control" id="summernote" name="meta_description"
                                    rows="4">{{ $seo->meta_description }}</textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card-body">
                                <label>Logo :</label><br>
                                <img alt="Logo" src="{{ asset($seo->logo) }}" id="output" width="150"/>
                                <input type="file" name="logo" class="form-control" value="{{$seo->logo}}" onchange="loadFile(event)">
                                 @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card-body">
                                <label>Favicon :</label><br>
                                <img alt="favicon" src="{{ asset($seo->favicons) }}" width="150" id="output1" />
                                <input type="file" name="favicons" class="form-control" value="{{$seo->favicons}}" onchange="loadFile1(event)">
                                 @error('favicons')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="summernote">Google Analytics</label>
                                <textarea class="form-control" id="summernote1" name="google_analytics"
                                    rows="4">{{ $seo->google_analytics }}</textarea>
                                @error('google_analytics')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Google Verification</label>
                                <input type="text" class="form-control" name="google_verification" value="{{ $seo->google_verification }}">
                                @error('google_verification')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="summernote">Alexa Analytics</label>
                                <textarea class="form-control" id="summernote2" name="alexa_analytics"
                                    rows="4">{{ $seo->alexa_analytics }}</textarea>
                                @error('alexa_analytics')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-info mr-2">Update</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var loadFile = (event) =>{
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);

        }

        var loadFile1 = (event) =>{
            var output1 = document.getElementById('output1');
            output1.src = URL.createObjectURL(event.target.files[0]);

        }
    </script>
@endsection
