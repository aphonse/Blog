@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="text-align: center">Edit your post</div>

                <div class="card-body">
                    <ul>
                        <form method="post" action="{{action('PostsController@update')}}" enctype="multipart/form-data">
                            {{--Very important--}}
                            {{ csrf_field() }}
                            {{--Very important--}}

                            @include('pages.messages')
                            <label>Name</label><br>
                            <input type="text" name="name45"><br>
                            <label>Message</label><br>
                            <textarea name="message" placeholder="Write something..."></textarea><br>
                            <input type="file" name="image"><br><br>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="submit" name="submit" value="Submit">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
