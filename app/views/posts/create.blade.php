@extends('_templates.forms')

@section('content')

    <div class="row"> 
        <div class="col-sm-12">
            {{HTML::image("img/icons/svg/pencils.svg")}} 
            <h4>Create Newsletter</h4>
        </div>
    </div>

    {{Form::open(['route' => 'post.store', 'files'=>true])}}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::file('image', ['class'=>'form-control','title'=>'Add Image', 'data-filename-placement'=>'inside']) }}
                </div> 
            </div>
        </div>  

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::textarea('body', null, ['id' => 'editor_area', 'class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="checkbox" for="publish">
                      <input type="checkbox" name="publish" id="publish" data-toggle="checkbox">
                      Publish
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::submit('Save',['class' => 'btn btn-default mrs']) }}
                </div>
            </div>
        </div>
    {{Form::close()}}
@stop()


@section('sidebar')
    <div class="row"> 
        <div class="col-sm-12">
            <h4>Quick tip:</h4>
            <small>
            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
            </small>
        </div>
        <div class="col-sm-12">
            <h4>Dont forget to save!</h4>
            <small>
            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
            </small>
        </div>
    </div>
@stop()