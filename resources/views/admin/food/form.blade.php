@extends('admin.base.layout')
@section('title')
Food
@endsection
@if(empty($model))
    @section('subtitle')
    Create
    @endsection
@else
    @section('subtitle')
    Edit
    @endsection
@endif
@section('top_title')
Food Form
@endsection

@section('content')
{!! Form::model($model, [
        'url' => $route,
        'method' => $method,
        'id' => 'demo-form2',
        'class' => 'form-horizontal form-label-left',
        'files' => true,
        'data-parsley-validate'
    ]) !!}
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cover</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
              <input 
                    type="file" 
                    name="cover"
                    id="input-file-disable-remove" 
                    class="dropify" 
                    data-show-remove="false" 
                    data-max-file-size="100M"
                    @if($model) 
                        @if($model->cover)  
                            data-default-file="{{ $model->cover }}"
                        @endif
                    @endif
                />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Name','required'=>'required']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           {{ Form::number('price', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Price','required'=>'required','min'=>'0']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           {{ Form::select('category', $category, $model ? $model->category_id : null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Category','required'=>'required']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           {{ Form::select('status', ['0'=>'inactive','1'=>'active'],null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Status','required'=>'required']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success pull-right">Submit</button>
        </div>
    </div>
{!! Form::close() !!}

@endsection
@push('pageRelatedJs')
      <script>
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez'
                    , replace: 'Glissez-déposez un fichier ou cliquez pour remplacer'
                    , remove: 'Supprimer'
                    , error: 'Désolé, le fichier trop volumineux'
                }
            });
            // Used events
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                }
                else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endpush