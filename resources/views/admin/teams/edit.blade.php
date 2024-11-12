@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="{{route('teams.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{route('teams.update',$team->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div>
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="" class="form-control" value="{{$team->name}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" id="" class="form-control" value="{{$team->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Phone</label>
                        <input type="tel" name="phone" id="" class="form-control" value="{{$team->phone}}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Role</label>
                        <select name="role_id" id="" class="form-control">
                            @foreach ($roleCollections as $item)
                                @if ($item->id == $team->role_id)
                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="" class="form-label">Department</label>
                        <select name="department_id" id="" class="form-control">
                            @foreach ($depCollections as $item)
                                @if ($item->id == $team->department_id)
                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>


                    <div class="mt-3">
                        <button class="btn btn-primary">Update Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
