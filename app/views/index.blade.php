@extends('_templates.master')
@section('content')
    @foreach($posts as $post)
        {{$post->title}}<br>
        {{HTML::image($post->image) }}<br>
        @include('partials.post.post_details') {{--time, author--}}
        {{$post->excerpt}}<br>
        {{strlen($post->excerpt) > 150 ? HTML::link('/post/'. $post->id, 'Read More') : '.'}}<br>
    @endforeach
@stop
