@extends('_templates.master')
@section('content')
    <h1 class="headings-disply">{{$post->title}}</h1><br>
    {{HTML::image($post->image) }}<br>
	@include('partials.post.post_details')
    {{$post->body}}
@stop