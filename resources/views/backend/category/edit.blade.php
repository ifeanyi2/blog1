@extends('admin.admin_master')
@section('title', 'Edit:: '.$category->category_en)
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    <form class="forms-sample" method="POST" action="{{ route('update.category', $category->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Category English</label>
                            <input type="text" class="form-control" name="category_en" placeholder="Category English" autofocus value="{{ $category->category_en }}">
                            @error('category_en')
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
