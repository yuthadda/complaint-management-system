@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{route('teams.store')}}" method="POST">
                    @csrf
                    <div>
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="" class="form-control">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Role</label>
                        <select name="role_id" id="" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="" class="form-label">Department</label>
                        <select name="department_id" id="" class="form-control">
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" id="" class="form-control">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Phone</label>
                        <input type="tel" name="phone" id="" class="form-control">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>



                    <div class="mt-3">
                        <button class="btn btn-primary">Add Team</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
