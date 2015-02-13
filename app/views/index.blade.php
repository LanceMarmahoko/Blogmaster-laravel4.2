@extends('_templates.master')
@section('content')
    @foreach($posts as $post)
        {{$post->title}}<br>
        By {{display_name_of($post->user->username) == "" ? $post->user->username : display_name_of($post->user->username);}}<br>
        Published {{$post->created_at->diffForHumans()}}<br>
        {{HTML::image($post->image) }}<br>
        {{$post->excerpt}}<br>
        {{strlen($post->excerpt) > 150 ? '...<a href="/' . $post->id . '">Read More</a>' : '.'}}<br>
    @endforeach
@stop