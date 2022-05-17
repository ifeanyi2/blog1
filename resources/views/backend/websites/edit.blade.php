@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Website</h4>
                <form class="forms-sample" action="{{ route('update.website', $website->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="website_name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="website_name" name="website_name"
                            value="{{ $website->website_name }}">
                        @error('website_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summernote1">Website Link</label>
                        <textarea class="form-control" id="summernote1" name="website_link" rows="4">{{ $website->website_link }}</textarea>
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
