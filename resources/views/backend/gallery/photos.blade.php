@extends('admin.admin_master')
@section('title', 'All photo Gallery')
@section('admin')
<link href="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" type="text/css" rel="stylesheet" />
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Photo Gallery</h4>
                <p class="card-description"><code><a href="{{ route('add.photo') }}" class="btn btn-info btn-fw">New Photo</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Photo </th>
                                <th> Title </th>
                                <th> Type </th>
                                <th> Created At </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n= 1;
                            @endphp
                            @foreach ( $photo as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>
                                    <a title="{{ $row->title }}" href="#" data-featherlight="{{ asset($row->photo) }}">
                                    <img src="{{ asset($row->photo) }}" alt="photo" width="100" >
                                    </a>
                                    <small class="text-info">click to view</small>
                                </td>
                                <td>{{ $row->title }}</td>
                                <td>
                                    @if ($row->type == 1)
                                      <span class="badge badge-success">Big Photo</span>
                                    @else
                                      <span class="badge badge-primary">Small Photo</span>
                                    @endif
                                </td>

                                <td>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('edit.photo', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.photo', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $photo->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-latest.js"></script>
<script src="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
@endsection
