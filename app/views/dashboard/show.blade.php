@extends('_templates.master')

@section('content')
@section('content')
<div>
    @foreach($published as $published)
        <div>
            <h4>{{$published->title}} {{$published->created_at->diffForHumans()}}</h4>
            <p>
                {{$published->excerpt}}
                <a href="/dashboard/{{$published->id}}/edit" class="btn btn-primary">Edit</a>
            </p>
        </div>
    @endforeach    
    @foreach($unpublished as $unpublished)
        <div>
            <h4>{{$unpublished->title}} {{$unpublished->created_at->diffForHumans()}}</h4>
            <p>
                {{$unpublished->excerpt}}
                <a href="/dashboard/{{$unpublished->id}}/edit" class="btn btn-primary">Edit</a>
            </p>
        </div>
    @endforeach
</div>
@stop
