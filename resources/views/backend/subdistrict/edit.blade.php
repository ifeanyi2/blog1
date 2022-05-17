@extends('admin.admin_master')
@section('title', 'Edit:: '.$subdistrict->subdistrict_en)
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit SubDistrict</h4>

                    <form class="forms-sample" method="POST" action="{{ route('update.subdistricts', $subdistrict->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="">SubDistrict English</label>
                            <input type="text" class="form-control" name="subdistrict_en" autofocus value="{{ $subdistrict->subdistrict_en }}">
                            @error('subdistrict_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Parent District Name</label>
                            <select name="district_id" id="" class="form-control">
                                <option value="" disabled selected> -- Select Parent Category</option>
                                @foreach ($district as $row)
                                    <option value="{{ $row->id }}"
                                        <?php if($row->id == $subdistrict->district_id) echo "selected"; ?>
                                        >{{ $row->district_en}}</option>
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
