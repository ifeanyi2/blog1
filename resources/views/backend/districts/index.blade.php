@extends('admin.admin_master')
@section('title', 'Districts')
@section('admin')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Districts..</h4>
                <p class="card-description"><code><a href="{{ route('add.districts') }}" class="btn btn-info btn-fw">New Districts</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Districts English </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n= 1;
                            @endphp
                            @foreach ( $districts as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $row->district_en }}</td>
                                <td>
                                    <a href="{{ route('edit.districts', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.districts', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $districts->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
