@extends('admin.admin_master')
@section('title', 'Create new ADS')
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create ADS</h4>
                <form class="forms-sample" action="{{ route('store.ads') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input class="form-control" type="text" id="link" name="link"
                            placeholder="Link">
                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ads" class="form-label">ADS Image</label>
                        <input class="form-control" type="file" id="ads" name="ads">
                        @error('ads')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value=""> -- Select ADS Size</option>
                            <option value="1"> -- Horizontal ADS</option>
                            <option value="0"> -- Vertical ADS</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <button type="submit" class="btn  btn-outline-primary mr-2">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection
