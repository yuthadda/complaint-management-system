@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="{{route('departments.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{route('departments.update',$department->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div>
                        <label for="" class="form-label">Department Name</label>
                        <input type="text" name="name" id="" class="form-control" value="{{$department->name}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Code</label>
                        <input type="text" name="code" id="" class="form-control" value="{{$department->code}}">
                        @error('code')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Phone</label>
                        <input type="text" name="phone" id="" class="form-control" value="{{$department->phone}}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary">Update Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
