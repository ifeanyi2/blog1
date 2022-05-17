@extends('admin.admin_master')
@section('title', 'All Video post')
@section('admin')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Video Posts</h4>
                <p class="card-description"><code><a href="{{ route('create.video') }}" class="btn btn-info btn-fw">New Video Post</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Title </th>
                                <th> Video </th>
                                <th> Thumbnail </th>
                                <th> Category </th>
                                <th> District </th>
                                <th> View Counts </th>
                                <th> Likes </th>
                                <th> Created At </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n= 1;
                            @endphp
                            @foreach ( $allvideo as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td title="{{ $row->title }}">{{ Str::limit($row->title, 6) }}</td>
                                <td>
                                    <a href="{{ asset($row->video) }}" data-lity>
                                       <span class="badge badge-success badge-small">View </span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ asset($row->thumbnail) }}" data-lity>
                                       <img src="{{ asset($row->thumbnail) }}" alt="" class="img-responsive" width="200">
                                    </a>
                                </td>
                                <td>{{ $row->category_en }}</td>
                                <td>{{ $row->district_en }}</td>
                                <td>{{ $row->view_count }}</td>
                                <td>{{ $row->likes }}</td>
                                <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('edit.videos', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.videos', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $allvideo->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
