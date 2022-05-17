@extends('admin.admin_master')
@section('title', 'Create Sub-District')
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new SubDistrict</h4>

                    <form class="forms-sample" method="POST" action="{{ route('store.subdistricts') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">SubDistrict English</label>
                            <input type="text" class="form-control" name="subdistrict_en" placeholder="Sub-District English" autofocus>
                            @error('subdistrict_en')
                                <span class="text-danger"></span>
                            @enderror
                        </div>
                     
                        <div class="form-group">
                            <label for="">Parent District Name</label>
                            <select name="district_id" id="" class="form-control">
                                <option value="" disabled selected> -- Select Parent District</option>
                                @foreach ($district as $row)
                                    <option value="{{ $row->id }}">{{ $row->district_en}}</option>
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
