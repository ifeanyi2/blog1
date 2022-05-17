@extends('admin.admin_master')
@section('title', 'User Profile')
@section('admin')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Profile</h4>
                <p><a href="{{ route('userprofile.edit') }}" class="btn btn-primary btn-small">Update Profile</a></p>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                @if (Auth::user()->type == 1)
                                    Administrator
                                @else
                                    Member
                                @endif
                            </h4>
                            
                            <div class="d-flex py-4">
                                <div class="preview-list w-100">
                                    <div class="preview-item p-0">
                                        <div class="preview-thumbnail">
                                         <img src="{{ (!empty(Auth::user()->image)) ? url('upload/user_images/'.Auth::user()->image) : url('upload/no_image.png') }}" alt="" style="width: 100px;height:100px">
                                        </div>
                                        <div class="preview-item-content d-flex flex-grow">
                                            <div class="flex-grow">
                                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                   <h6 class="preview-subject">{{ Auth::user()->name }}</h6><br><br>
                                                    
                                                </div>
                                                <p class="text-muted"><b>Email: </b>{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted"><b>Mobile: </b>{{ Auth::user()->mobile }}</p>
                            <p class="text-muted"><b>Gender: </b>{{ Auth::user()->gender }}</p>
                            <p class="text-muted"><b>Postion: </b>{{ Auth::user()->position }}</p>
                            <p class="text-muted"><b>Account No: </b>{{ Auth::user()->account_no }}</p>
                            <p class="text-muted"><b>Account Namr: </b>{{ Auth::user()->account_name }}</p>
                            <p class="text-muted"><b>Bank: </b>{{ Auth::user()->bank_name }}</p>
                            <p class="text-muted"><b>Address: </b>{{ Auth::user()->address }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
