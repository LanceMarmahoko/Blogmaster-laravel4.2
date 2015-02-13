@extends('_templates.master')

@section('content')
<div>
    <ul>
        @foreach($published as $published)
            {{$published->title}}<br>
            {{$published->created_at->diffForHumans()}}<br>
            <a href="/post/{{$published->id}}/edit">Edit</a><br>
            <a href="#" data-toggle="modal" data-target="#confirmSoftDeletePublished">Trash</a><br>
            <a href="#" data-toggle="modal" data-target="#confirmUnpublish">Unpublish</a><br>

            <div class="modal fade" id="confirmUnpublish" tabindex="-1" role="dialog" aria-labelledby="confirmUnpublishLabel" aria-hidden="true"> 
                <div class="modal-dialog"> 
                    <div class="modal-content"> 
                        <div class="modal-header">Unpublish Post</div> 
                        <div class="modal-body">Are you sure you want to unpublish this post? </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <a class="btn btn-danger danger" href="/post/{{$published->id}}/unpublish">Yes</a> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirmSoftDeletePublished" tabindex="-1" role="dialog" aria-labelledby="confirmSoftDeletePublishedLabel" aria-hidden="true"> 
                <div class="modal-dialog"> 
                    <div class="modal-content"> 
                        <div class="modal-header">Trash Post</div> 
                        <div class="modal-body">
                            Moving this post to trash will unpublish it automatically, Are you sure you want to do this? 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <a class="btn btn-danger danger" href="/post/{{$published->id}}/softDelete">Yes</a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach  
    </ul>

        <!-- UnPublished -->
    <ul>
        @foreach($unpublished as $unpublished)
            {{$unpublished->title}}<br>
            {{$unpublished->created_at->diffForHumans()}}<br>
            <a href="/post/{{$unpublished->id}}/edit">Edit</a><br>
            <a href="#" data-toggle="modal" data-target="#confirmSoftDeleteUnPublished">Trash</a><br>
            <a href="#" data-toggle="modal" data-target="#confirmPublish">Publish</a><br>
            <!--Confirm Unpublish post-->
            <div class="modal fade" id="confirmPublish" tabindex="-1" role="dialog" aria-labelledby="confirmPublishLabel" aria-hidden="true">
                <div class="modal-dialog"> 
                    <div class="modal-content"> 
                        <div class="modal-header">Publish Post</div> 
                        <div class="modal-body">Are you sure you want to publish this post? </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <a class="btn btn-danger danger" href="/post/{{$unpublished->id}}/publish">Yes</a> 
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <a class="btn btn-danger danger" href="/post/{{$unpublished->id}}/softDelete">Yes</a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>

    <!-- Trashed -->
    <ul>
        @foreach($trashed as $trashed)
            {{$trashed->title}}<br>
            {{$trashed->created_at->diffForHumans()}}<br>
            <a href="/post/{{$trashed->id}}/restore">Restore</a><br>
            <a href="#" data-toggle="modal" data-target="#confirmHardDelete">Delete</a><br>

            <div class="modal fade" id="confirmHardDelete" tabindex="-1" role="dialog" aria-labelledby="confirmHardDeleteLabel" aria-hidden="true"> 
                <div class="modal-dialog"> 
                    <div class="modal-content"> 
                        <div class="modal-header">Trash Post</div> 
                        <div class="modal-body"> Are you sure you want to delete this post permanantly? </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <a class="btn btn-danger danger" href="/post/{{$trashed->id}}/destroy">Yes</a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</div> 
@stop
