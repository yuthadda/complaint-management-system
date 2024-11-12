@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <div>
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="name" id="" class="form-control">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="form-label">Parent Category</label>
                        <select name="parent_id" id="" class="form-control">
                            <option value="">No Parent</option>
                            @foreach ($parents as $parent)
                            <option value="{{$parent->id}}">{{$parent->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
