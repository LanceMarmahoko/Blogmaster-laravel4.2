@extends('_templates.forms')


@section('content')
    {{Form::model($post, ['method'=>'PATCH','files'=>true, 'route' => ['post.update', $post->id]])}}
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::file('image', ['class'=>'data-bfi-disabled','title'=>'Change image', 'data-filename-placement'=>'inside']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::textarea('body', null, ['id' => 'editor_area','class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="checkbox" for="publish">
                      <input type="checkbox" name="publish" id="publish" data-toggle="checkbox">
                      Publish
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{ Form::submit('Save',['class' => 'btn btn-default mrs']) }}
            </div>
        </div>
    {{Form::close()}}
@stop()