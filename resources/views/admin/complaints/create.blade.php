@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 m-auto">
                <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-8 mb-3">
                            <input type="checkbox" name="anonymous" value="anonymous">
                            <label for="" class="form-label">Anonymous</label>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Phone</label>
                            <input type="tel" name="phone" id="" class="form-control">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="" class="form-label">Complaint Type</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Role</label>
                            <select name="role_id" id="" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Department</label>
                            <select name="department_id" id="" class="form-control">
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id=""  class="form-control"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <input type="file" name="files[]" id="" class="form-control" multiple>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary">Submit Complaint</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
