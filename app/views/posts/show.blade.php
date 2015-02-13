@extends('_templates.master')
@section('content')
	{{$author}}<br>
    {{$post->title}}<br>
    {{$post->body}}
@stop