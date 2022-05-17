@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new District</h4>
                    <form class="forms-sample" method="POST" action="{{ route('store.district') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">District English</label>
                            <input type="text" class="form-control" name="district_en" placeholder="District English" autofocus>
                            @error('district_en')
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
