@extends('admin.admin_master')
@section('title', 'All Users')
@section('admin')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Users</h4>
                <p class="card-description"><code><a href="{{ route('add.user') }}" class="btn btn-info btn-fw">New User</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Role </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n= 1;
                            @endphp
                            @foreach ( $users as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>

                                <td>

                                    @if ($row->category == 1)
                                      <span class="badge badge-primary">Category</span>
                                    @else
                                    @endif
                                    @if ($row->district == 1)
                                      <span class="badge badge-success">District</span>
                                    @else
                                    @endif
                                    @if ($row->posts == 1)
                                      <span class="badge badge-success">Posts</span>
                                    @else
                                    @endif
                                    @if ($row->video_post == 1)
                                      <span class="badge badge-success">Video Posts</span>
                                    @else
                                    @endif
                                    @if ($row->setting == 1)
                                      <span class="badge badge-success">Settings</span>
                                    @else
                                    @endif
                                    @if ($row->gallery == 1)
                                      <span class="badge badge-dark">Gallery</span>
                                    @else
                                    @endif
                                    @if ($row->website == 1)
                                      <span class="badge badge-secondary">Website</span>
                                    @else
                                    @endif
                                    @if ($row->ads == 1)
                                      <span class="badge badge-primary">ADS</span>
                                    @else
                                    @endif



                                </td>
                                <td>
                                    <a href="{{ route('edit.user', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.user', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
