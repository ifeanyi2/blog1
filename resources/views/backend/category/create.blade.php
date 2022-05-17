@extends('admin.admin_master')
@section('title', 'Create Category')
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new category</h4>
                    <form class="forms-sample" method="POST" action="{{ route('store.category') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Category English</label>
                            <input type="text" class="form-control" name="category_en" placeholder="Category English" autofocus>
                            @error('category_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
