@extends('_templates.forms')

@section('content')
    {{Form::open(['route' => 'dashboard.store', 'files'=>true])}}
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::file('image', ['class'=>'data-bfi-disabled','title'=>'Search for a file to add', 'data-filename-placement'=>'inside']) }}
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::textarea('body', null, ['id' => 'editor_area', 'class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('publish', 'Publish:') }}
                    {{ Form::checkbox('publish',null,null,['id' => 'publish']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::submit('Save',['class' => 'btn btn-default mrs']) }}
                </div>
            </div>
        </div>
    {{Form::close()}}
@stop()