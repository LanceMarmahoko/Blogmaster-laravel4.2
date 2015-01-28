@extends('_templates.master')

@section('content')
@section('content')
<div>
    @foreach($posts as $post)
        <div>
            <h4>{{$post->title}} {{$post->created_at->diffForHumans()}}</h4>
            <p>
                {{$post->excerpt}}
                <a href="dashboard/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            </p>
        </div>
    @endforeach
</div>
@stop