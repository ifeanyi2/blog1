@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Websites</h4>
                <p class="card-description"><code><a href="{{ route('create.website') }}" class="btn btn-info btn-fw">New Website</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Link </th>
                                <th> Created At </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n= 1;
                            @endphp
                            @foreach ( $website as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $row->website_name }}</td>
                                <td title="{{ $row->website_link }}">{{ Str::limit($row->website_link, 20) }}</td>

                                <td>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('edit.website', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.website', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $website->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
