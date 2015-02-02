@extends('_templates.master')

@section('content')
@section('content')
<div>
    <div>
    @foreach($published as $published)
        <div>
            <h4>{{$published->title}} {{$published->created_at->diffForHumans()}}</h4>
            <p>
                {{$published->excerpt}}
                <a href="/dashboard/{{$published->id}}/edit" class="btn btn-primary">Edit</a>
                <a data-href="#" data-toggle="modal" data-target="#confirmDelete">Delete</a>
            </p>
        </div>


        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true"> 
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="modal-header"> ... </div> 
                    <div class="modal-body"> ... </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger danger" href="/dashboard/{{$published->id}}/destroy">Delete</a> 
                    </div>
                </div>
            </div>
        </div>
    @endforeach   
    </div> 

    
    @foreach($unpublished as $unpublished)
        <div>
            <h4>{{$unpublished->title}} {{$unpublished->created_at->diffForHumans()}}</h4>
            <p>
                {{$unpublished->excerpt}}
                <a href="/dashboard/{{$unpublished->id}}/edit" class="btn btn-primary">Edit</a>
            </p>
        </div>
    @endforeach
@stop
