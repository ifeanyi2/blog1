@extends('admin.admin_master')
@section('title', 'Edit User:: '. $user->name)
@section('admin')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add User Role</h4>
                        <form class="forms-sample" method="POST" action="{{ route('update.user', $user->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <div class="form-check form-check-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="category" value="1"
                                                @if($user->category == 1) checked @endif > Category </label>
                                        </div>
                                        <div class="form-check form-check-info">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="district" value="1"
                                                 @if($user->district == 1) checked @endif
                                                > District </label>
                                        </div>
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="posts" value="1"
                                                 @if($user->posts == 1) checked @endif
                                                > Posts </label>
                                        </div>
                                        <div class="form-check form-check-warning">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="video_post" value="1"
                                                 @if($user->video_post == 1) checked @endif
                                                > Video Posts </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <div class="form-check form-check-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="setting" value="1"
                                                 @if($user->setting == 1) checked @endif
                                                > Settings </label>
                                        </div>
                                        <div class="form-check form-check-info">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="website" value="1"
                                                 @if($user->website == 1) checked @endif
                                                > Website </label>
                                        </div>
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="gallery" value="1"
                                                 @if($user->gallery == 1) checked @endif
                                                > Gallery </label>
                                        </div>
                                        <div class="form-check form-check-warning">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="ads" value="1"
                                                 @if($user->ads == 1) checked @endif
                                                > Ads </label>
                                        </div>
                                        <div class="form-check form-check-warning">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="role" value="1"
                                                 @if($user->role == 1) checked @endif
                                                > Role </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-secondary mr-2">UPDATE</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
