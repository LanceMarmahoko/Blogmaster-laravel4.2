@extends('_templates.forms')


@section('content')
    {{Form::open(['route' => 'storesession'])}}
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                {{ Form::submit('Submit',['class' => 'btn btn-default mrs']) }}
            </div>
        </div>
    {{Form::close()}}
@stop()