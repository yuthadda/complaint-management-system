@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2 mx-3">
                <a href="{{route('complaints.create')}}" class="btn btn-primary">Add New Complaints</a>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-primary">Restore All</a>
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
                            <th>Name</th>
                            <th>Anonymous</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($complaints as $complaint)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$complaint->name}}</td>
                                <td>{{$complaint->anonymous}}</td>
                                <td>{{$complaint->email}}</td>
                                <td>{{$complaint->category->name}}</td>
                                <td>{{$complaint->role->name}}</td>
                                <td>{{$complaint->department->name}}</td>
                                <td>{{$complaint->status}}</td>
                                <td data-url="{{route('complaints.destroy',$complaint->id)}}" class="d-flex">
                                    <a href="{{route('complaints.edit',$complaint->id)}}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger btn-delete-complaint">Delete</button>
                                </td>

                                @if ($complaint->status == 1)
                                <td><p>Already forwarded</p></td>

                                @else

                                <td data-url="{{route('complaints.forward',$complaint->id)}}">
                                    <a href="{{route('complaints.forward',$complaint->id)}}" class="btn btn-primary">Forward</a>
                                    {{-- <button class="btn btn-info btn-forward">Forward</button> --}}
                                </td>

                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"><span class="text-danger">No complaint data</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
