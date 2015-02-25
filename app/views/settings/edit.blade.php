@extends('_templates.forms')
@section('content')
    {{--General--}}
    {{Form::model($user->settings, ['method'=>'PATCH', 'route' => ['update_display_name', $user->username]])}}
    {{ Form::text('display_name', null, ['placeholder' => 'Display Name']) }}<br>
    {{errors_for('display_name', $errors)}}
    {{ Form::submit('Submit') }}
    {{Form::close()}}<br><hr>
    {{--Categories--}}

    {{Form::open(['route' => 'create_and_store_category', 'files'=>true])}}
        {{ Form::text('category', null, ['placeholder' => 'Add Category']) }}<br>
        {{errors_for('category', $errors)}}
        {{ Form::file('image', ['title'=>'Add Image', 'data-filename-placement'=>'inside']) }}<br>
        {{learn_about_errors_for('image', $errors, 'We are so sorry for this but, we wont be able to continue unless an image is provided. ', '/sos.com')}}
        {{ Form::submit('Submit') }}
    {{Form::close()}}<br>

    @foreach($category as $cat)
        <ul>
         <li>{{HTML::image($cat->thumbnail)}}<h3>{{$cat->name}}</h3></li>   
        </ul>
    @endforeach

@stop