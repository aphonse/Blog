@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Welcome to Aphonse' Blog</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <a href="/posts/create">Create a new post</a>
                    </div>
                        <div>
                            <br>
                            <h5>New Posts</h5>
                            <ul>
                                {{--{{$post}}--}}
                                @if(count($post)>0)
                                    @foreach($post as $item)
                                        <li> <a href="posts/{{$item->id}}">{{$item->name}}</a></li>
                                    @endforeach
                                    {{$post->links()}}
                                @endif
                            </ul>
                        </div>
                    {{--You are logged in!--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
