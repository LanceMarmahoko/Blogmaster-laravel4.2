@extends('_templates.forms')

@section('content')
    {{Form::model($post, ['method'=>'PATCH','files'=>true, 'route' => ['post.update', $post->id]])}}
    {{ Form::text('title', null, ['placeholder' => 'Title']) }}<br>
    {{ Form::file('image', ['title'=>'Add Image', 'data-filename-placement'=>'inside']) }}<br>
    {{ Form::select('category_id', $category_list) }}<br>
    {{ Form::textarea('body', null, ['id' => 'editor_area']) }}<br>
    {{ Form::checkbox('publish',null,$publish_status) }}<br>
    {{ Form::submit('Save') }}
    {{Form::close()}}
@stop
