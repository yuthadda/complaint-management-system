@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{route('departments.store')}}" method="POST">
                    @csrf
                    <div>
                        <label for="" class="form-label">Department Name</label>
                        <input type="text" name="name" id="" class="form-control">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Code</label>
                        <input type="text" name="code" id="" class="form-control">
                        @error('code')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="" class="form-label">Phone</label>
                        <input type="text" name="phone" id="" class="form-control">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary">Add Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
