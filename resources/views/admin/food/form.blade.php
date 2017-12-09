@extends('admin.base.app')

@if(empty($model))
    @section('page_header','Create Food')
@else
    @section('page_header','Edit Food')
@endif

@section('breadcrumblv2')
    @if(empty($model))
        <li>Food</li>
        <li class="active">Create</li>
    @else
        <li>Food</li>
        <li class="active">Edit</li>
    @endif
@endsection

@section('content')
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box p-l-20 p-r-20">
            <div class="row">
                <div class="col-md-12">
                {!! Form::model($model, [
                        'url' => $route,
                        'method' => $method,
                        'id' => 'remarkForm',
                        'class' => 'form-material form-horizontal',
                        'files' => true
                    ]) !!}
                        <div class="form-group">
                            <label for="name" class="col-md-12">Cover</label>
                            <div class="col-md-6">
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
                            <label for="name" class="col-md-12">Name</label>
                            <div class="col-md-12">
                              {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name','required'=>'required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-12">Price</label>
                            <div class="col-md-12">
                              {{ Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Price','required'=>'required','min'=>'0']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-12">Category</label>
                            <div class="col-md-12">
                              {{ Form::select('category', $category, $model ? $model->category_id : null, ['class' => 'form-control', 'placeholder' => 'Choose Category','required'=>'required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-12">Status</label>
                            <div class="col-md-12">
                              {{ Form::select('status', ['0'=>'inactive','1'=>'active'],null, ['class' => 'form-control', 'placeholder' => 'Choose Status','required'=>'required']) }}
                            </div>
                        </div>
                        <div class="form-group text-right">
                          <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
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