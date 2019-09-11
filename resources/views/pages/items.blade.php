@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
    <div class="col-md-9">
    <div class="card">
        <div class="card-header">{{$post->name}}</div>
        <div class="card-body">
            <ul class="card">{{$post->message}}<br></ul>
            <ul>
                <img src="/storage/images/{{$post->image}}" alt="No image" width="200" height="150">
                <br>
                <a href="/posts/{{$post->id}}/edit">Edit Post</a>
            </ul>
        </div>
    </div>
</div>
    </div>

@endsection
