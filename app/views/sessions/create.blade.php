@extends('_templates.forms')
@section('content')
    {{Form::open(['route' => 'storesession'])}}
    {{ Form::email('email', null, ['placeholder' => 'Email']) }}<br>
    {{ Form::password('password',['placeholder' => 'Password']) }}<br>
    {{ Form::submit('Submit') }}<br>
    {{Form::close()}}
@stop