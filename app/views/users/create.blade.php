@extends('_templates.forms')

@section('content')
    {{Form::open(['route' => 'register_user'])}}
	    {{ Form::text('username', null, ['placeholder' => 'Username']) }}<br>
	    {{errors_for('username', $errors)}}
	    {{ Form::email('email', null, ['placeholder' => 'Email']) }}<br>
	    {{errors_for('email', $errors)}}
	    {{ Form::password('password',['placeholder' => 'Password']) }}<br>
	    {{errors_for('password', $errors)}}
	    {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password']) }}<br>
	    {{errors_for('password_confirmation', $errors)}}
	    {{ Form::submit('Submit') }}<br>
    {{Form::close()}}
@stop     