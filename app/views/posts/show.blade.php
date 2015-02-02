@extends('_templates.master')
@section('content')
<div>
    <h4>{{$post->title}}</h4>
    
    <p>
        {{$post->body}}
    </p>
</div>
@stop