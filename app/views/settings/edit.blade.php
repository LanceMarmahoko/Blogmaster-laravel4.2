@extends('_templates.forms')
@section('content')

<div class="row">
    <div class=" banners col-sm-12 text-left">
        <h1 class="headings">
            Settings
        </h1>
    </div>
</div>

    {{--General--}}
<span class="labels">Change display name</span>
    {{Form::model($user->settings, ['method'=>'PATCH', 'route' => ['update_display_name', $user->username]])}}
    {{ Form::text('display_name', null, ['placeholder' => 'Display Name']) }}<br>
    {{errors_for('display_name', $errors)}}
    {{ Form::submit('Submit') }}
    {{Form::close()}}<br><hr>
    {{--Categories--}}

<span class="labels">Add category</span>

    {{Form::open(['route' => 'create_and_store_category', 'files'=>true])}}
        {{ Form::text('category', null, ['placeholder' => 'Add Category']) }}<br>
        {{errors_for('category', $errors)}}
        {{ Form::file('image', ['title'=>'Add Image', 'data-filename-placement'=>'inside']) }}<br>
        {{learn_about_errors_for('image', $errors, 'Sorry for this but, we wont be able to continue unless an image is provided. ', '/sos.com')}}
        {{ Form::submit('Submit') }}
    {{Form::close()}}<br>

    @foreach($category as $cat)
    <div class="media col-sm-12">
      <div class="media-left">
          {{HTML::image($cat->thumbnail)}}
      </div>
      <div class="media-body">
        <h4 class="media-heading">{{$cat->name}}</h4>
      </div>
    </div>   
    @endforeach

@stop