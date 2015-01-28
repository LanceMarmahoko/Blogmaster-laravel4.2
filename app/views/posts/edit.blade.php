@extends('_templates.forms')


@section('content')
    {{Form::model($post, ['method'=>'PATCH', 'route' => ['dashboard.update', $post->id]])}}
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                {{ Form::submit('Submit',['class' => 'btn btn-default mrs']) }}
            </div>
        </div>
    {{Form::close()}}
@stop()