@extends('admin.admin_master')
@section('title', 'Create User Role')
@section('admin')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add User Role</h4>
                        <form class="forms-sample" method="POST" action="{{ route('save.user') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" autofocus>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <div class="form-check form-check-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="category" value="1"> Category </label>
                                        </div>
                                        <div class="form-check form-check-info">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="district" value="1"> District </label>
                                        </div>
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="posts" value="1"> Posts </label>
                                        </div>
                                        <div class="form-check form-check-warning">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="video_post" value="1"> Video Posts </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <div class="form-check form-check-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="setting" value="1"> Settings </label>
                                        </div>
                                        <div class="form-check form-check-info">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="website" value="1"> Website </label>
                                        </div>
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="gallery" value="1"> Gallery </label>
                                        </div>
                                        <div class="form-check form-check-warning">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="ads" value="1"> Ads </label>
                                        </div>
                                        <div class="form-check form-check-warning">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="role" value="1"> Role </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-secondary mr-2">SAVE</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
