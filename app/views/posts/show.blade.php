@extends('_templates.master')
@section('content')
	<div class="show_post col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
	    <h2 class="headings-disply">{{$post->title}}</h2><br>
	    <div class="show_post_image">{{HTML::image($post->image) }}</div>
		@include('partials.post.post_details')
	    <div class="body">{{$post->body}}</div>
	</div>
@stop