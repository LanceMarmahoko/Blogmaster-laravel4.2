@extends('_templates.master')
@section('content')
<div class=" banners col-sm-12 text-left">
    <h1 class="headings">
     Dashboard
    </h1>
</div>
@foreach($published as $published)
    <div class="media col-sm-8 col-md-offset-3">
      <div class="media-left media-middle media-icon">
        <div class="btn-group-vertical col-sm-12" role="group">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default"><i class="fa fa-eye"></i></button>
          </div>
        </div>
      </div>
          <div class="media-body">
            <h4 class="media-heading"><span class="label label-info">{{$published->created_at->diffForHumans()}}</span> {{$published->title}}</h4>
            {{$published->excerpt}}
          </div>
      <ul class="col-sm-12 quick-actions">
        <li class="form-reset">
            {{ Form::open(['method'=>'GET','route' => ['unpublish', $published->id]])}}
                <button class='btn-plain' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Unpublish Post' data-message='Are you sure you want to Unpublish this post?' data-cancel='No' data-danger='Yes'>Unpublish</button>
            {{ Form::close() }}
        </li>
        <li>
            <a href="/post/{{$published->id}}/edit">Edit</a>
        </li>

        </ul>
    </div>
@endforeach 



@foreach($unpublished as $unpublished)
    <div class="media col-sm-8 col-md-offset-3">
      <div class="media-left media-middle media-icon">
        <div class="btn-group-vertical col-sm-12" role="group">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default"><i class="fa fa-eye-slash"></i></button>
          </div>
        </div>
      </div>
          <div class="media-body">
            <h4 class="media-heading"><span class="label label-info">{{$unpublished->created_at->diffForHumans()}}</span> {{$unpublished->title}}</h4>
            {{$unpublished->excerpt}}
          </div>
      <ul class="col-sm-12 quick-actions">
        <li class="form-reset">
            {{ Form::open(['method'=>'GET','route' => ['trash', $unpublished->id]])}}
                <button class='btn-plain' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Trash Post' data-message='Are you sure you want to trash this post?' data-cancel='No' data-danger='Yes'>Trash</button>
            {{ Form::close() }}
        </li>
        <li class="form-reset">
            {{ Form::open(['method'=>'GET','route' => ['publish', $unpublished->id]])}}
                <button class='btn-plain' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Publish Post' data-message='Are you sure you want to Publish this post?' data-cancel='No' data-danger='Yes'>Publish</button>
            {{ Form::close() }}
        </li>
        <li>
            <a href="/post/{{$unpublished->id}}/edit">Edit</a>
        </li>

        </ul>
    </div>
@endforeach 

@foreach($trashed as $trashed)
    <div class="media col-sm-8 col-md-offset-3">
      <div class="media-left media-middle media-icon">
        <div class="btn-group-vertical col-sm-12" role="group">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default"><i class="fa fa-trash"></i></button>
          </div>
        </div>
      </div>
          <div class="media-body">
            <h4 class="media-heading"><span class="label label-info">{{$trashed->created_at->diffForHumans()}}</span> {{$trashed->title}}</h4>
            {{$trashed->excerpt}}
          </div>
      <ul class="col-sm-12 quick-actions">
        <li class="form-reset">
            {{ Form::open(['method'=>'GET','route' => ['destroy', $trashed->id]])}}
                <button class='btn-plain' type='submit' data-toggle="modal" data-target="#confirmation" data-title='Delete Post' data-message='Are you sure you want to Delete this post?' data-cancel='No' data-danger='Yes'>Delete</button>
            {{ Form::close() }}
        </li>
        <li>
            <a href="/post/{{$trashed->id}}/restore">Restore</a><br>
        </li>
        </ul>
    </div>
@endforeach 
@stop
