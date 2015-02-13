@extends('_templates.forms')
@section('content')
    {{Form::model($user->settings, ['method'=>'PATCH', 'route' => ['settings.update', $user->username]])}}
    {{ Form::text('display_name', null, ['placeholder' => 'Display Name']) }}<br>
    {{ Form::submit('Submit') }}
    {{Form::close()}}
@stop