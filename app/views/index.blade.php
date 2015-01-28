@extends('_templates.master')
@section('content')
<div>
    @foreach($posts as $post)
        <div>
            <h4>{{$post->title}} {{$post->created_at->diffForHumans()}}</h4>
            <p>
                {{
                $post->excerpt, strlen($post->excerpt) > 150 
                ? '...<a href="/' . $post->id . '" class="btn btn-inverse">Read More</a>' 
                : '.' 
                }}
                
            </p>
        </div>
    @endforeach
</div>
@stop