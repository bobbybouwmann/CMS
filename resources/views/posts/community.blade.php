@extends('defaults.layout')

@section('title')
    Community Posts
@stop

@section('content')
    <h3 class="text-center">Community Posts</h3>
    {{ $posts->count() }}
@stop
