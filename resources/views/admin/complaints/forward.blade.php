@extends('layout.master')
@section('content')
<div id="layoutSidenav_content">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="{{route('complaints.send')}}" method='post'>
                    @csrf
                    <input type="hidden" name="complaint" value="{{$complaint->id}}">
                    <div class="card">
                        <div class="card-header">
                            <h2>{{$complaint->title}}</h2>
                        </div>
                        <div class="card-body">
                            <p>{{$complaint->description}}</p>
                            @foreach ($team as $member)
                                <input type="checkbox" name="members[{{$member->id}}]" value="{{$member->id}}">{{$member->name}}
                                <br>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
