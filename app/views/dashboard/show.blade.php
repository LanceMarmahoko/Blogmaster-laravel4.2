@extends('_templates.master')

@section('content')
<div>
    <div>

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Published</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Unpublished</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Trashed</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    @foreach($published as $published)
        <blockquote>
          <p>{{$published->title}}</p>
          <footer>
          {{$published->created_at->diffForHumans()}}
            <a href="/dashboard/{{$published->id}}/edit">Edit</a>
            <a data-href="#" data-toggle="modal" data-target="#confirmDelete">Delete</a>
          </footer>
        </blockquote>
    @endforeach  
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
            @foreach($unpublished as $unpublished)
        <blockquote>
          <p>{{$unpublished->title}}</p>
          <footer>
          {{$unpublished->created_at->diffForHumans()}}
            <a href="/dashboard/{{$unpublished->id}}/edit">Edit</a>
            <a data-href="#" data-toggle="modal" data-target="#confirmDelete">Delete</a>
          </footer>
        </blockquote>
    @endforeach
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
  </div>

</div>
        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true"> 
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="modal-header"> Delete Post </div> 
                    <div class="modal-body"> Are you sure about this? </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger danger" href="/dashboard/{{$published->id}}/destroy">Delete</a> 
                    </div>
                </div>
            </div>
        </div>

    </div> 
@stop
