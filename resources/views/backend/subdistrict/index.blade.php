@extends('admin.admin_master')
@section('title', 'Sub-Districts')
@section('admin')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All SubCategory</h4>

                <p class="card-description"><code><a href="{{ route('add.subdistricts') }}" class="btn btn-info btn-fw">New SubDistrict</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>SubDistrict English </th>
                                <th>Parent District Name </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n= 1;
                            @endphp
                            @foreach ( $subdistrict as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $row->subdistrict_en }}</td>
                                <td>{{ $row->district_en }}</td>
                                <td>
                                    <a href="{{ route('edit.subdistricts', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.subdistricts', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $subdistrict->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
