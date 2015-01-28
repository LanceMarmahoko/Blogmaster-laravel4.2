@extends('_templates.forms')

@section('content')
    {{Form::open(['route' => 'dashboard.store'])}}
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
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
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::submit('Submit',['class' => 'btn btn-default mrs']) }}
                </div>
            </div>
        </div>
    {{Form::close()}}
@stop()
           