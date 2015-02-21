@extends('_templates.forms')
@section('content')
    {{--General--}}
    {{Form::model($user->settings, ['method'=>'PATCH', 'route' => ['update_displayname', $user->username]])}}
    {{ Form::text('display_name', null, ['placeholder' => 'Display Name']) }}<br>
    {{ Form::submit('Submit') }}
    {{Form::close()}}<br><hr>
    {{--Categories--}}
    {{Form::open(['route' => 'create_and_store_category'])}}
    	@foreach($category as $cat)
    	<h3>{{$cat->name}}</h3>
    	@endforeach
    	{{ Form::text('category', null, ['placeholder' => 'Add Category']) }}<br>
    	{{ Form::submit('Submit') }}
    {{Form::close()}}<br>
@stop