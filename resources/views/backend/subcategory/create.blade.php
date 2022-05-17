@extends('admin.admin_master')
@section('title', 'Add Subcategory')
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new SubCategory</h4>
                    <form class="forms-sample" method="POST" action="{{ route('store.subcategory') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">SubCategory English</label>
                            <input type="text" class="form-control" name="subcategory_en" placeholder="SubCategory English" autofocus>
                            @error('subcategory_en')
                                <span class="text-danger"></span>
                            @enderror
                        </div>
                     
                        <div class="form-group">
                            <label for="">Parent Category Name</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="" disabled selected> -- Select Parent Category</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
