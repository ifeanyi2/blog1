@extends('admin.admin_master')
@section('title', 'Notice Page')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Notice Board</h4>
                        @if ($notice->status == 1)
                            <a href="{{ route('deactivate.notice', $notice->id) }}" class="btn btn-danger"
                                style="background: green;border:none;margin:20px;color:#fff">Active</a>

                            <small class="text-success">Notice is live</small>
                        @else
                            <a href="{{ route('active.notice', $notice->id) }}" class="btn btn-secondary"
                                style="background: crimson;border:none;margin:20px;color:#fff">Inactive</a>

                            <small class="text-warning">Notice is Currently Inactive</small>
                        @endif


                        <form class="forms-sample" method="POST" action="{{ route('update.notice', $notice->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="summernote">Embedded Link</label>
                                <textarea class="form-control" id="summernote" name="notice"
                                    rows="4">{{ $notice->notice }}</textarea>
                                @error('emded_code')
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
