@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2 mx-3">
                <a href="{{route('departments.create')}}" class="btn btn-primary">Add New Department</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('departments.restore')}}" class="btn btn-primary">Restore All</a>
            </div>
        </div>
        <div class="row col-md-4 mt-3">
            @if ($message = Session::get('success'))
                <span class="alert alert-success d-block w-100" >{{$message}}</span>
            @endif
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Department Name</th>
                            <th>Code</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $department)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$department->code}}</td>
                                <td>{{$department->phone}}</td>
                                <td data-url="{{route('departments.destroy',$department->id)}}" class="d-flex">
                                    <a href="{{route('departments.edit',$department->id)}}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger btn-delete-department">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"><span class="text-danger">No department  data</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
