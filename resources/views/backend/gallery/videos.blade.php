@extends('admin.admin_master')
@section('title', 'Add Video Gallery')
@section('admin')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Video Gallery</h4>
                <p class="card-description"><code><a href="{{ route('add.video') }}" class="btn btn-info btn-fw">New Video</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Video Link</th>
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
                            @foreach ( $video as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $row->embed_code }}</td>
                                <td>{{ $row->title }}</td>
                                <td>
                                    @if ($row->type == 1)
                                      <span class="badge badge-success">Big Video</span>
                                    @else
                                      <span class="badge badge-primary">Small Video</span>
                                    @endif
                                </td>

                                <td>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('edit.video', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.video', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $video->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
