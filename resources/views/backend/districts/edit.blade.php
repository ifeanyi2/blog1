@extends('admin.admin_master')
@section('title', 'Edit:: '.$district->district_en)
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit District</h4>

                    <form class="forms-sample" method="POST" action="{{ route('update.district', $district->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="">District English</label>
                            <input type="text" class="form-control" name="district_en" placeholder="District English" autofocus value="{{ $district->district_en }}">
                            @error('district_en')
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
