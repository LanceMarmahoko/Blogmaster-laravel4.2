@extends('_templates.forms')

@section('content')
    {{Form::model($post, ['method'=>'PATCH','files'=>true, 'route' => ['post.update', $post->id]])}}
    {{ Form::text('title', null, ['placeholder' => 'Title']) }}<br>
    {{ Form::file('image', ['title'=>'Add Image', 'data-filename-placement'=>'inside']) }}<br>
    {{ Form::textarea('body', null, ['id' => 'editor_area']) }}<br>
    {{ Form::checkbox('publish',null,['data-toggle' =>'checkbox']) }}<br>
    {{ Form::submit('Save') }}
    {{Form::close()}}
@stop