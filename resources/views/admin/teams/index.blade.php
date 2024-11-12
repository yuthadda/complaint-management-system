@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2">
                <a href="{{route('teams.create')}}" class="btn btn-primary">Add New Teams</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('teams.restore')}}" class="btn btn-primary">Restore All</a>
            </div>
        </div>
        <div class="row col-md-4 mt-3">
            @if ($message = Session::get('success'))
                <span class="alert alert-success d-block w-100" >{{$message}}</span>
            @endif
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $team)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->email}}</td>
                                <td>{{$team->phone}}</td>
                                <td>{{$team->role->name}}</td>
                                <td>{{$team->department->name}}</td>
                                <td data-url="{{route('teams.destroy',$team->id)}}" class="d-flex">
                                    <a href="{{route('teams.edit',$team->id)}}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger btn-delete-team">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">No team data</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- {{$teams->links()}} --}}
    </div>
@endsection
