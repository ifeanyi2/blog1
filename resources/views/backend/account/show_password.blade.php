@extends('admin.admin_master')
@section('title', 'Change Password')
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                <form class="forms-sample" action="{{ route('update.password') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="link" class="form-label">Current Password</label>
                        <input class="form-control" type="password" id="current_password" name="oldpassword">
                        @error('oldpassword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">New Password</label>
                        <input class="form-control" type="password" id="password" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Confirm Password</label>
                        <input class="form-control" type="password" id="password_confirmation" name="confirm_password">
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    


                    <button type="submit" class="btn  btn-outline-primary mr-2">CHANGE</button>

                </form>
            </div>
        </div>
    </div>
@endsection
