@extends('_templates.master')
@section('content')
<div>
    @foreach($posts as $post)
        <div>
            <h4>{{$post->title}}</h4>
            <h4>By {{$post->user['username']}}</h4>
            <h5>Published {{$post->created_at->diffForHumans()}}</h5>
            {{HTML::image($post->image) }}
            <p>{{$post->excerpt}}</p>
            <p>{{strlen($post->excerpt) > 150 ? '...<a href="/' . $post->id . '" class="btn btn-inverse">Read More</a>' : '.'}}</p>
        </div>
    @endforeach
</div>
@stop