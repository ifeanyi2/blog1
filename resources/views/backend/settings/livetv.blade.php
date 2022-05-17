@extends('admin.admin_master')
@section('title', 'Live Tv Setting')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Live Tv </h4>
                        @if ($livetv->status == 1)
                            <a href="{{ route('deactivate.livetv', $livetv->id) }}" class="btn btn-danger"
                                style="background: green;border:none;margin:20px;color:#fff">Active</a>

                            <small class="text-success">Live Tv is Currently Active</small>
                        @else
                            <a href="{{ route('active.livetv', $livetv->id) }}" class="btn btn-secondary"
                                style="background: crimson;border:none;margin:20px;color:#fff">Inactive</a>

                            <small class="text-warning">Live Tv is Currently Inactive</small>
                        @endif


                        <form class="forms-sample" method="POST" action="{{ route('update.livetv', $livetv->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="summernote">Embedded Link</label>
                                <textarea class="form-control" id="summernote" name="embed_code"
                                    rows="4">{{ $livetv->embed_code }}</textarea>
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
