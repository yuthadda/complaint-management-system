@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2">
                <a href="{{route('categories.create')}}" class="btn btn-primary">Add New Category</a>
            </div>
            <div class="col-md-2">
                <a href="{{route('categories.restore')}}" class="btn btn-primary">Restore All</a>
            </div>
        </div>
        <div class="row col-md-4 mt-3">
            @if ($message = Session::get('success'))
                <span class="alert alert-success d-block w-100" >{{$message}}</span>
            @endif
        </div>
        <div class="row mt-3">
            <div class="col-md-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Parent Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                {{-- <td>{{ ++$i }}</td> --}}
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                @if ($category->parent == null)
                                <td>-</td>
                                @else <td>{{$category->parent->name}}</td>
                                @endif

                                {{-- <td>
                                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-delete" type="submit">Delete</button>
                                    </form>
                                    <button class="btn btn-danger btn-delete">Delete</button>
                                </td> --}}
                                <td data-url="{{route('categories.destroy',$category->id)}}" class="d-flex">
                                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger btn-delete-category">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">No category data</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- {{$categories->links()}} --}}
    </div>
@endsection
