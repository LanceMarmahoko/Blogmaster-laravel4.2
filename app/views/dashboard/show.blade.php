@extends('_templates.master')

@section('content')
<div class="row">
<div class=" banners col-sm-12 text-left">
        <h1 class="headings col-sm-4">
         Dashboard
        </h1>
</div>
</div>
<div>
    <ul>
        @foreach($published as $published)
            <h1 class="headings-disply">{{$published->title}}</h1><br>
            {{$published->created_at->diffForHumans()}}<br>

            <a href="/post/{{$published->id}}/edit"  class='btn btn-xs'>Edit</a><br>
            
            {{ Form::open(['method'=>'GET','route' => ['unpublish', $published->id]])}}
                <button class='btn btn-xs btn-danger' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Unpublish Post' data-message='Are you sure you want to Unpublish this post?' data-cancel='No' data-danger='Yes'>Unpublish</button>
            {{ Form::close() }}

            {{ Form::open(['method'=>'GET','route' => ['trash', $published->id]])}}
                <button class='btn btn-xs btn-danger' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Trash Post' data-message='Are you sure you want to trash this post?' data-cancel='No' data-danger='Yes'>Trash</button>
            {{ Form::close() }}
        @endforeach  
    </ul>

    <ul>
        @foreach($unpublished as $unpublished)
            {{$unpublished->title}}<br>
            {{$unpublished->created_at->diffForHumans()}}<br>

            <a href="/post/{{$unpublished->id}}/edit" class='btn btn-xs'>Edit</a><br>

            {{ Form::open(['method'=>'GET','route' => ['publish', $unpublished->id]])}}
                <button class='btn btn-xs btn-danger' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Publish Post' data-message='Are you sure you want to publish this post?' data-cancel='No' data-danger='Yes'>Publish</button>
            {{ Form::close() }}

            {{ Form::open(['method'=>'GET','route' => ['trash', $unpublished->id]])}}
                <button class='btn btn-xs btn-danger' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Trash Post' data-message='Are you sure you want to trash this post?' data-cancel='No' data-danger='Yes'>Trash</button>
            {{ Form::close() }}
        @endforeach
    </ul>

    <ul>
        @foreach($trashed as $trashed)
            {{$trashed->title}}<br>
            {{$trashed->created_at->diffForHumans()}}<br>

            <a href="/post/{{$trashed->id}}/restore" class='btn btn-xs'>Restore</a><br>

            {{ Form::open(['method'=>'GET','route' => ['destroy', $trashed->id]])}}
                <button class='btn btn-xs btn-danger' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Destroy Post' data-message='Are you sure you want to destroy this post?' data-cancel='No' data-danger='Yes'>Destroy</button>
            {{ Form::close() }}
        @endforeach
    </ul>
</div> 
@stop
