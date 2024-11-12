@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="{{route('roles.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{route('roles.update',$role->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div>
                        <label for="" class="form-label">Role Name</label>
                        <input type="text" name="name" id="" class="form-control" value="{{$role->name}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary">Update Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
