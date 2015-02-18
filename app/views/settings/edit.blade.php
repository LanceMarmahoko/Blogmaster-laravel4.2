@extends('_templates.forms')
@section('content')
    {{Form::model($user->settings, ['method'=>'PATCH', 'route' => ['settings.update_username', $user->username]])}}
    {{ Form::text('display_name', null, ['placeholder' => 'Display Name']) }}<br>
    {{ Form::submit('Submit') }}
    {{Form::close()}}<br>
    <hr>
    {{Form::model($user->categories, ['method'=>'PATCH', 'route' => ['settings.update_categories', $user->username]])}}
    Category Updates go here!
    {{Form::close()}}<br>
@stop