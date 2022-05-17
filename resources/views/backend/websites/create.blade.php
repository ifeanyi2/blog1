@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Post</h4>
                <form class="forms-sample" action="{{ route('store.website') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="website_name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="website_name" name="website_name"
                            placeholder="Example: sitename.com">
                        @error('website_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summernote1">Website Link</label>
                        <textarea class="form-control" id="summernote1" name="website_link" rows="4"
                            placeholder="Example: https://sitename.com"></textarea>
                        @error('website_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn  btn-outline-primary mr-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
