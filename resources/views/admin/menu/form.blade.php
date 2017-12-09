@extends('admin.base.layout')
@section('title')
Menu
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
Menu Form
@endsection
@push('pageRelatedCss')
<style type="text/css">
.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}
</style>
@endpush
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
            {{ Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Name','required'=>'required','maxlength'=>30]) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           {{ Form::number('price', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Price','required'=>'required','min'=>'0']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           {{ Form::select('status', ['0'=>'inactive','1'=>'active'],null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Status','required'=>'required']) }}
        </div>
    </div>
    <div id="food-group">
        @if($model)
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foods</label>
            @foreach($attaches as $key=>$attach)
            @php
                $number = $key + 1;
            @endphp
            @if($number == 1)
            <div class="col-md-6 col-sm-6 col-xs-12">
               {{ Form::select('food[]', $food, $attach->id, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Food','required'=>'required']) }}
            </div>
            @else
            <div id="food-select">
                <div id="food{{$number}}"> 
                    <div  class="col-md-5 col-sm-5 col-xs-11 col-md-offset-3" style="margin-top:10px;">
                    {{ Form::select(
                        'food[]',
                        $food,
                         $attach->id, 
                        ['class' => 'form-control col-md-6 col-xs-11', 
                        'placeholder' => 'Choose Food',
                        'required'=>'required']) }}
                    </div>
                <button 
                    type="button" 
                    class="btn btn-circle btn-default col-md-1 col-sm-1 col-xs-1" 
                    style="margin-top:10px"
                    onclick="removeAppend('#food{{$number}}')">&times;</button> 
                </div>
            </div>
            @endif
            @endforeach
            
            
        </div>
        
        @else
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foods</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               {{ Form::select('food[]', $food, null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Food','required'=>'required']) }}
            </div>
            <div id="food-select"></div>
        </div>
        @endif
        <div class="form-group">
            <a class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" href="javascript:void(0);" id="add-more">add more</a>
        </div>
        
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('description', null, ['size' => '30x5','class' => 'form-control col-md-7 col-xs-12','placeholder'=>'add description']) }}
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
            var num = 1;
            $('#add-more').click(function() {
                num += 1;
                $('#food-select').append(`<div id="food`+num+`"> <div  class="col-md-5 col-sm-5 col-xs-11 col-md-offset-3" style="margin-top:10px;">
               {{ Form::select('food[]', $food, null, ['class' => 'form-control col-md-6 col-xs-11', 'placeholder' => 'Choose Food','required'=>'required']) }}
                </div>
                <button 
                type="button" 
                class="btn btn-circle btn-default col-md-1 col-sm-1 col-xs-1" 
                style="margin-top:10px"
                onclick="removeAppend('#food`+num+`')">&times;</button> </div>`);
            })


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
        function removeAppend(id) {
            $(id).html('');
        }
    </script>
@endpush