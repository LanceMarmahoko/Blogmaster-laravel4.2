@extends('_templates.forms')
@section('content')
    <div class=" banners col-sm-8 col-md-offset-1 text-left">
        <h1 class="headings">
           Sign in
        </h1>
    </div>
    {{Form::open(['route' => 'store_session'])}}
    {{ Form::email('email', null, ['placeholder' => 'Email']) }}<br>
    {{errors_for('email', $errors)}}
    {{ Form::password('password',[],['placeholder' => 'Password']) }}<br>
    {{errors_for('password', $errors)}}
    {{ Form::submit('Submit') }}<br>
    {{Form::close()}}
@stop

 