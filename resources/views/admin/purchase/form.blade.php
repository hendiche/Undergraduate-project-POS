@extends('admin.base.layout')
@section('title')
Purchase
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
Purchase Form
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
<!-- .row -->
<div class="row">
{!! Form::model($model, [
        'url' => $route,
        'method' => $method,
        'id' => 'demo-form2',
        'class' => 'form-horizontal form-label-left',
        'files' => true,
        'data-parsley-validate'
    ]) !!}
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Number</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <p class="form-control col-md-7 col-xs-12">1234567</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <p class="form-control col-md-7 col-xs-12">{{ Auth::user()->name }}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foods</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           {{ Form::select('food[]', $food, null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Food','required'=>'required']) }}
        </div>
        <div id="food-select"></div>
    </div>
    <div class="form-group">
        <a class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" href="javascript:void(0);" id="add-more">add more</a>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menus</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           {{ Form::select('menu[]', $menu, null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Menu','required'=>'required']) }}
        </div>
        <div id="menu-select"></div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Note</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('note', null, ['size' => '30x5','class' => 'form-control col-md-7 col-xs-12','placeholder'=>'add description']) }}
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
            });
        });
        function removeAppend(id) {
            $(id).html('');
        }
    </script>
@endpush