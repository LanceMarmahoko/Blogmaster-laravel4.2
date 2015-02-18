@extends('_templates.forms')

@section('content')
    {{Form::open(['route' => 'post.store', 'files'=>true])}}
    {{ Form::text('title', null, ['placeholder' => 'Title']) }}<br>
    {{ Form::file('image', ['title'=>'Add Image', 'data-filename-placement'=>'inside']) }}<br>
    {{ Form::select('category', $categories_list) }}<br>
    {{ Form::textarea('body', null, ['id' => 'editor_area']) }}<br>
    {{ Form::checkbox('publish',null,null) }}<br>
    {{ Form::submit('Save') }}
    {{Form::close()}}
@stop

@section('sidebar')
    Side Bar
@stop