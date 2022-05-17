@extends('admin.admin_master')
@section('title', 'Update Profile:: ' . $editData->name)
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Profile</h4>
                <form class="forms-sample" action="{{ route('save.profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $editData->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email"  value="{{ $editData->email }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input class="form-control" type="text" id="phone" name="mobile"  value="{{ $editData->mobile }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input class="form-control" type="text" id="address" name="address"  value="{{ $editData->address }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Position</label>
                        <input class="form-control" type="text" id="position" name="position"  value="{{ $editData->position }}">
                        @error('position')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Bank</label>
                        <input class="form-control" type="text" id="bank_name" name="bank_name"  value="{{ $editData->bank_name }}">
                        @error('bank_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Account Name</label>
                        <input class="form-control" type="text" id="account_name" name="account_name"
                            value="{{ $editData->account_name }}">
                        @error('account_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Account Number</label>
                        <input class="form-control" type="text" id="account_no" name="account_no"
                             value="{{ $editData->account_no }}">
                        @error('account_no')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ads" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ads" class="form-label">Old Image</label>
                                <img src="{{ (!empty($editData->image)) ? url('upload/user_images/'.$editData->image) : url('upload/no_image.png') }}" alt="" style="width: 100px;height:100px">
                             
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Gender</label>
                        <select name="gender" id="type" class="form-control">
                            <option value=""> -- Select Gender</option>
                            <option value="Male" {{ $editData->gender == "Male" ? "selected" : '' }}> -- Male</option>
                            <option value="Female" {{ $editData->gender == "Femalr" ? "selected" : '' }}> -- Female</option>
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
