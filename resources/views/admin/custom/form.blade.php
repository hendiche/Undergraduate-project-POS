@extends('admin.base.layout')
@section('title')
Custom
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
Custom Form
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
    <div id="food-group">
        @if($model)
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foods</label>
            
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-11">
                   {{ Form::select('food[]', $food, $attaches[0]->id, ['class' => 'foods form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Food','required'=>'required']) }}
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1">
                    {{ Form::number('quantity[]', $attaches[0]->pivot->quantity, ['class' => 'quantities form-control', 'placeholder' => 'qty','min'=>'1','id'=>'quantity1']) }}
                </div>
            </div>
            <div id="food-select" class="row">
            @foreach($attaches as $key=>$attach)
            @php
                $number = $key + 1;
            @endphp
            @if($number != 1)
                <div id="food{{$number}}"> 
                    <div  class="col-md-5 col-sm-5 col-xs-11 col-md-offset-3" style="margin-top:10px;">
                    {{ Form::select(
                        'food[]',
                        $food,
                         $attach->id, 
                        ['class' => 'foods form-control col-md-6 col-xs-11', 
                        'placeholder' => 'Choose Food',
                        'required'=>'required']) }}
                    </div>
                <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top:10px;">
                    {{ Form::number('quantity[]', $attach->pivot->quantity, ['class' => 'quantities form-control', 'placeholder' => 'qty','min'=>'1','id'=>'quantity']) }}
                </div>
                <button 
                    type="button" 
                    class="btn btn-circle btn-default col-md-1 col-sm-1 col-xs-1" 
                    style="margin-top:10px"
                    onclick="removeAppend('#food{{$number}}')">&times;</button> 
                </div>
                @endif
            @endforeach
            </div>
        </div>
        {{-- <div class="form-group">
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
            
            
        </div> --}}
        
        @else
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foods</label>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-11">
                    {{ Form::select('food[]', $food, null, ['class' => 'foods form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Food','required'=>'required','id'=>'food-sel1']) }}
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1">
                    {{ Form::number('quantity[]', 1, ['class' => 'quantities form-control', 'placeholder' => 'qty','min'=>'1','id'=>'quantity1']) }}
                </div>
                <div id="food-select"></div>
            </div>
        </div>
        {{-- /asdfasdfasdf --}}
        {{-- <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foods</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               {{ Form::select('food[]', $food, null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Food','required'=>'required']) }}
            </div>
            <div id="food-select"></div>
        </div> --}}
        @endif
        <div class="form-group">
            <a class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" href="javascript:void(0);" id="add-more">add more</a>
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
                $('#food-select').append(`<div class="row" id="food`+num+`"> 
                    <div  class="col-md-5 col-sm-5 col-xs-11 col-md-offset-3" style="margin-top:10px;">
                        {{ Form::select('food[]', $food, null, ['class' => 'foods form-control col-md-6 col-xs-11', 'placeholder' => 'Choose Food','required'=>'required','id'=>'food-sel`+num+`']) }}
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top:10px;">
                        {{ Form::number('quantity[]', 1, ['class' => 'quantities form-control', 'placeholder' => 'qty','min'=>'1','id'=>'quantity`+num+`']) }}
                    </div>
                    <button 
                        type="button" 
                        class="btn btn-circle btn-default col-md-1 col-sm-1 col-xs-1" 
                        style="margin-top:10px"
                        onclick="removeAppend('#food`+num+`')">&times;</button> 
                </div>`);
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