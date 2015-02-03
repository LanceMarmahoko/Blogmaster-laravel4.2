@extends('_templates.master')

@section('content')
<div>
    <div role="tabpanel">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#published" aria-controls="published" role="tab" data-toggle="tab">Published</a></li>
        <li role="presentation"><a href="#unpublished" aria-controls="unpublished" role="tab" data-toggle="tab">Unpublished</a></li>
        <li role="presentation"><a href="#trashed" aria-controls="trashed" role="tab" data-toggle="tab">Trash</a></li>
      </ul>

      <!-- Tab panes -->
      <!-- Published -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="published">
            @foreach($published as $published)
                <blockquote>
                  <p>{{$published->title}}</p>
                  <footer>
                  {{$published->created_at->diffForHumans()}}
                    <a href="/dashboard/{{$published->id}}/edit">Edit</a>
                    <a href="#" data-toggle="modal" data-target="#confirmSoftDeletePublished">Trash</a>
                    <a href="#" data-toggle="modal" data-target="#confirmUnpublish">Unpublish</a>
                  </footer>
                </blockquote>

                <!--Confirm Unpublish post-->
                <div class="modal fade" id="confirmUnpublish" tabindex="-1" role="dialog" aria-labelledby="confirmUnpublishLabel" aria-hidden="true"> 
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                            <div class="modal-header">Unpublish Post</div> 
                            <div class="modal-body">Are you sure you want to unpublish this post? </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default" data-dismiss="modal">Nope</button>
                                <a class="btn btn-danger danger" href="/dashboard/{{$published->id}}/unpublish">Do it aready!</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <!--Confirm trash post-->
                <div class="modal fade" id="confirmSoftDeletePublished" tabindex="-1" role="dialog" aria-labelledby="confirmSoftDeletePublishedLabel" aria-hidden="true"> 
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                            <div class="modal-header">Trash Post</div> 
                            <div class="modal-body">Moving this post to trash will unpublish it automatically, Are you sure you want to do this? </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default" data-dismiss="modal">Eish!, not really you know.</button>
                                <a class="btn btn-danger danger" href="/dashboard/{{$published->id}}/softDelete">Yea, Just do it.</a> 
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach  
        </div>

        <!-- UnPublished -->
        <div role="tabpanel" class="tab-pane" id="unpublished">
            @foreach($unpublished as $unpublished)
                <blockquote>
                  <p>{{$unpublished->title}}</p>
                  <footer>
                  {{$unpublished->created_at->diffForHumans()}}
                    <a href="/dashboard/{{$unpublished->id}}/edit">Edit</a>
                    <a href="#" data-toggle="modal" data-target="#confirmSoftDeleteUnPublished">Trash</a>
                    <a href="#" data-toggle="modal" data-target="#confirmPublish">Publish</a>
                  </footer>
                </blockquote>

                <!--Confirm Unpublish post-->
                <div class="modal fade" id="confirmPublish" tabindex="-1" role="dialog" aria-labelledby="confirmPublishLabel" aria-hidden="true"> 
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                            <div class="modal-header">Publish Post</div> 
                            <div class="modal-body">Are you sure you want to publish this post? </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default" data-dismiss="modal">Nope</button>
                                <a class="btn btn-danger danger" href="/dashboard/{{$unpublished->id}}/publish">Do it aready!</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <!--Confirm trash post-->
                <div class="modal fade" id="confirmSoftDeleteUnPublished" tabindex="-1" role="dialog" aria-labelledby="confirmSoftDeleteUnPublishedeLabel" aria-hidden="true"> 
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                            <div class="modal-header">Trash Post</div> 
                            <div class="modal-body"> Are you sure you want to move this post to your trash? </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default" data-dismiss="modal">Nope, Just changed my mind :)</button>
                                <a class="btn btn-danger danger" href="/dashboard/{{$unpublished->id}}/softDelete">Yep, Continue!</a> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Trashed -->
        <div role="tabpanel" class="tab-pane" id="trashed">
            @foreach($trashed as $trashed)
                <blockquote>
                  <p>{{$trashed->title}}</p>
                  <footer>
                  {{$trashed->created_at->diffForHumans()}}
                  <a href="/dashboard/{{$trashed->id}}/restore">Restore</a> 
                    <a href="#" data-toggle="modal" data-target="#confirmHardDelete">Delete</a>
                  </footer>
                </blockquote>

                  <div class="modal fade" id="confirmHardDelete" tabindex="-1" role="dialog" aria-labelledby="confirmHardDeleteLabel" aria-hidden="true"> 
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                            <div class="modal-header">Trash Post</div> 
                            <div class="modal-body"> Are you sure you want to delete this post permanantly? </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default" data-dismiss="modal">Nope, Just changed my mind :)</button>
                                <a class="btn btn-danger danger" href="/dashboard/{{$trashed->id}}/destroy">Yep, Continue!</a> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </div>
</div> 
@stop
