@extends('defaults.layout')

@section('title')
    Timeline
@stop

@section('content')
    {{-- Bottom content --}}
    <div class="row well well-sm">
        <div class="col-xs-6 col-sm-6 col-md-4 text-center">
            <h3>Make a post.</h3>
            <p>Go ahead and contribute to the community by <a href="#">making a post</a>! It can be on or about any topic that you'd like!</p>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 text-center">
            <h3>View all posts.</h3>
            <p>Need some insperation for a new post? Go ahead and <a href="#">read all posts</a> created to see what may spike your creativity.</p>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 text-center">
            <h3>Manage your posts.</h3>
            <p>Need to change or review any of your posts? Take a look <a href="#">here</a> if you want to edit or delete a post.</p>
        </div>
    </div>
@stop