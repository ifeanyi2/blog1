@extends('admin.admin_master')
@section('title', 'Edit:: ' . $ads->link)
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create ADS</h4>
                <form class="forms-sample" action="{{ route('update.ads', $ads->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input class="form-control" type="text" id="link" name="link" value="{{ $ads->link }}">
                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ads" class="form-label">ADS Image</label>
                                <input class="form-control" type="file" id="ads" name="ads">
                                @error('ads')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="old" class="form-label">Old Ads</label><br>
                                <img src="{{ asset($ads->ads) }}" alt="" width="100">
                                <input class="form-control" type="hidden" id="old" name="old" value="{{ $ads->ads }}">
                                @error('old')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="{{ $ads->type }}">
                            @if ($ads->type == 1)
                                {{ '-- Horizontal ADS' }}
                            @else
                                {{ '-- Vertical ADS' }}
                            @endif
                            </option>
                            <option value="{{ $ads->type }}"> ----------------- </option>
                            <option value="1"> -- Horizontal ADS</option>
                            <option value="0"> -- Vertical ADS</option>
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
