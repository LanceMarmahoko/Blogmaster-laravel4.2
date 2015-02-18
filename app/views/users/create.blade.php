@extends('_templates.forms')

@section('content')
    {{Form::open(['route' => 'registeruser'])}}
    {{ Form::text('username', null, ['placeholder' => 'Username']) }}<br>
    {{ Form::email('email', null, ['placeholder' => 'Email']) }}<br>
    {{ Form::password('password',['placeholder' => 'Password']) }}<br>
    {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password']) }}<br>
    {{ Form::submit('Submit') }}<br>
    {{Form::close()}}
@stop     