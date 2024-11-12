@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2">
                <a href="{{route('roles.create')}}" class="btn btn-primary">Add New Role</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('roles.restore')}}" class="btn btn-primary">Restore All</a>
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
                            <th>Role Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->name}}</td>

                                <td data-url="{{route('roles.destroy',$role->id)}}">
                                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger btn-delete-role">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"><span class="text-danger">No role  data</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
