@extends('admin.admin_master')
@section('title', 'All Beautiful Articles')
@section('admin')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Posts</h4>
                <p class="card-description"><code><a href="{{ route('create.post') }}" class="btn btn-info btn-fw">New Post</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Title </th>
                                <th> Category </th>
                                <th> District </th>
                                <th> Image </th>
                                <th> Created At </th>
                                <th> View Count </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n= 1;
                            @endphp
                            @foreach ( $post as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td title="{{ $row->title_en }}">{{ Str::limit($row->title_en, 10) }}</td>
                                <td>{{ $row->category_en }}</td>
                                <td>{{ $row->district_en }}</td>
                                <td><img src="{{ asset($row->image) }}" width="100" alt="{{ $row->title_en }}"></td>
                                <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
                                <td>{{ $row->view_count }}</td>
                                <td>
                                    <a href="{{ route('edit.post', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.post', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $post->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
