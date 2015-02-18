@extends('_templates.master')
@section('content')
    {{$post->title}}<br>
    {{HTML::image($post->image) }}<br>
	@include('partials.post.post_details')
    {{$post->body}}
@stop