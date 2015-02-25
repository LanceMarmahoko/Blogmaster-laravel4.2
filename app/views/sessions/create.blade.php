@extends('_templates.forms')
@section('content')
    {{Form::open(['route' => 'store_session'])}}
    {{ Form::email('email', null, ['placeholder' => 'Email']) }}<br>
    {{errors_for('email', $errors)}}
    {{ Form::password('password',['placeholder' => 'Password']) }}<br>
    {{errors_for('password', $errors)}}
    {{ Form::submit('Submit') }}<br>
    {{Form::close()}}
@stop