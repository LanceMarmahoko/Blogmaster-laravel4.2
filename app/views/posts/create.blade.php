@extends('_templates.forms')

@section('content')
    {{Form::open(['route' => 'post.store', 'files'=>true])}}
    {{ Form::text('title', null, ['placeholder' => 'Title']) }}<br>
    {{errors_for('title', $errors)}}
    {{ Form::file('image', ['title'=>'Add Image', 'data-filename-placement'=>'inside']) }}<br>
    {{ Form::select('category_id', $category_list) }}<br>
    {{ Form::textarea('body', null, ['id' => 'editor_area']) }}<br>
    {{errors_for('body', $errors)}}
    {{ Form::checkbox('publish_status',null,null) }}<br>
    {{ Form::submit('Save') }}
    {{Form::close()}}
@stop

@section('sidebar')
    Side Bar
@stop