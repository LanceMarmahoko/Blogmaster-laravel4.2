@extends('_templates.forms')


@section('content')
    {{Form::model($user, ['method'=>'PATCH', 'route' => ['updateuser', $user->username]])}}
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Display Name']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
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