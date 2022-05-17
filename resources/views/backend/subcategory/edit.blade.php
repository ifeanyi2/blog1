@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit SubCategory</h4>

                    <form class="forms-sample" method="POST" action=" {{ route('update.subcategory', $subcategory->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="">SubCategory English</label>
                            <input type="text" class="form-control" name="subcategory_en" autofocus value="{{ $subcategory->subcategory_en }}">
                            @error('subcategory_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <label for="">Parent Category Name</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="" disabled selected> -- Select Parent Category</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}"
                                        <?php if($row->id == $subcategory->category_id) echo "selected"; ?>
                                        >{{ $row->category_en}} || {{ $row->category_hin }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info mr-2">Update</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
