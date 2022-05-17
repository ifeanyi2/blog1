@extends('admin.admin_master')
@section('title', 'Add photo to Gallery')
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Photo</h4>
                <form class="forms-sample" action="{{ route('store.photo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control" type="text" id="title" name="title"
                            placeholder="Photo Title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input class="form-control" type="file" id="photo" name="photo">
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value=""> -- Select photo Size</option>
                            <option value="1"> -- Big Size</option>
                            <option value="0"> -- Small Size</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <button type="submit" class="btn  btn-outline-primary mr-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
