@extends('_templates.forms')

@section('content')
<div class="row">
    <div class=" banners col-sm-12 text-left">
        <h1 class="headings">
          Create a Post
        </h1>
        <h3 class="writer-quote">“The more you leave out, the more you highlight what you leave in.” <small>― Henry Green</small></h3>
    </div>
</div>
<div class="row">
    {{Form::open(['route' => 'post.store', 'files'=>true])}}
    {{ Form::text('title', null, ['placeholder' => 'Title']) }}<br>
    {{errors_for('title', $errors)}}
    {{ Form::file('image', ['title'=>'Add Image', 'data-filename-placement'=>'inside']) }}<br>
    <span class="labels">Category</span>&nbsp;{{ Form::select('category_id', $category_list) }}<br><br>
    <div class="row">
        <div class="col-sm-12 text-center">
        {{ Form::textarea('body', null, ['id' => 'editor_area']) }}
        </div>
    </div><br>
    {{errors_for('body', $errors)}}
    <span class="labels">Publish</span>&nbsp;{{ Form::checkbox('publish_status',null,null) }}&nbsp;
    {{ Form::submit('Save') }}
    {{Form::close()}}
</div>
@stop

@section('sidebar')
@stop
@section('footer_editor')
    @include('partials.footer_editor') 
@stop


