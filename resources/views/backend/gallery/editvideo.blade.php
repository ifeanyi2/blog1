@extends('admin.admin_master')
@section('title', 'Edit Video Gallery')
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Video</h4>
                <form class="forms-sample" action="{{ route('update.video', $video->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control" type="text" id="title" name="title"
                            value="{{ $video->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Embed Video Link</label>
                        <input class="form-control" type="text" id="embed_code" name="embed_code" value="{{ $video->embed_code }}">
                        @error('embed_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="{{ $video->type }}">
                            @if ($video->type == 1)
                              {{ 'Big Video' }}
                            @else
                              {{ 'Small Video' }}
                            @endif
                            </option>
                            <option value=""> -- Select Video Size</option>
                             <option value="1"> -- Big Size</option>
                            <option value="0"> -- Small Size</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <button type="submit" class="btn  btn-outline-warning mr-2">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
