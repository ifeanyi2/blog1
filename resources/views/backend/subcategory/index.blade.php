@extends('admin.admin_master')
@section('title', 'All Subcategory')
@section('admin')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All SubCategory</h4>
                <p class="card-description"><code><a href="{{ route('add.subcategory') }}" class="btn btn-info btn-fw">New SubCategory</a></code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>SubCategory English </th>
                                <th>Parent Category Name </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n= 1;
                            @endphp
                            @foreach ( $subcategory as $row)

                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $row->subcategory_en }}</td>
                                <td>{{ $row->category_en }}</td>
                                <td>
                                    <a href="{{ route('edit.subcategory', $row->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('delete.subcategory', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $subcategory->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
