@extends('_templates.master')
@section('content')
    @foreach($posts as $post)
<div class="row">
    <h1 class="headings text-left">
        {{{Auth::User()->username}}}'s blog
    </h1>
    <div class="col-sm-12 text-center">
        <h1 class></h1>
        {{$post->title}}<br>
        {{HTML::image($post->image) }}<br>
        @include('partials.post.post_details') {{--time, author--}}
        {{$excerpt = $post->excerpt}}<br>
        {{ get_read_more('Read More','/post/'. $post->id, $excerpt, 150) }}<br>
    </div>
</div>
    @endforeach
@stop
