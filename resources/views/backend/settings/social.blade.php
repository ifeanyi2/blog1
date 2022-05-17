@extends('admin.admin_master')
@section('title', 'Social Link Settings')
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Social Links</h4>
                    <form class="forms-sample" method="POST" action="{{ route('update.social', $social->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{ $social->facebook }}">
                            @error('facebook')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{ $social->twitter }}">
                            @error('twitter')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Youtube</label>
                            <input type="text" class="form-control" name="youtube" value="{{ $social->youtube }}">
                            @error('youtube')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">LinkedIn</label>
                            <input type="text" class="form-control" name="linkedin" value="{{ $social->linkedin }}">
                            @error('linkedin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Instagram</label>
                            <input type="text" class="form-control" name="instagram" value="{{ $social->instagram }}">
                            @error('instagram')
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
@endsection
