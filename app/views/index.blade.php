@extends('_templates.master')
@section('content')
    @foreach($posts as $post)
        {{$post->title}}<br>
        {{HTML::image($post->image) }}<br>
        @include('partials.post.post_details') {{--time, author--}}
        {{$excerpt = $post->excerpt}}<br>
        {{ get_read_more('Read More','/post/'. $post->id, $excerpt, 150) }}<br>
    @endforeach
@stop
