@extends('admin.base.layout')
@section('title')
Order
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
Order Form
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
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foods</label>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-11">
                    {{ Form::select('food[]', $food, null, ['class' => 'foods form-control col-md-7 col-xs-12', 'placeholder' => 'Choose Food','id'=>'food-sel1']) }}
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1">
                    {{ Form::number('quantity[]', 1, ['class' => 'quantities form-control', 'placeholder' => 'qty','min'=>'1','id'=>'quantity1']) }}
                </div>
            <div id="food-select"></div>
            </div>
            
        </div>
        <div class="form-group">
            <a class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" href="javascript:void(0);" id="add-more">add more</a>
        </div>
    </div>
    <div id="menu-group">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menus</label>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-11">
                    {{ Form::select('menu[]', $menu, null, ['class' => 'form-control col-md-7 col-xs-12','placeholder' => 'Choose Menu']) }}
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1">
                    {{ Form::number('quantity[]', 1, ['class' => 'form-control', 'placeholder' => 'qty','min'=>'1']) }}
                </div>
                <div id="menu-select" class="col-md-12 col-sm-12 col-xs-12"></div>
            </div>
        </div>
        <div class="form-group">
            <a class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" href="javascript:void(0);" id="add-menu">add more</a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           {{ Form::number('price', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Price','required'=>'required','min'=>'0','id'=>'price']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Note</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('note', null, ['size' => '30x5','class' => 'form-control col-md-7 col-xs-12','placeholder'=>'add note']) }}
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
            $('#food-group').on('change', 'select', function(event) {
                event.preventDefault();
                // var id = $(this).attr('id');
                // var lastChar = id.substr(8,id.length);
                var foods = $('.foods');
                var arrFood = [];
                var quantities = $('.quantities');
                var arrQty = [];
                for(var i = 0; i < quantities.length; i++){
                    arrQty.push($(quantities[i]).val());
                }
                for(var i = 0; i < foods.length; i++){
                    arrFood.push($(foods[i]).val());
                }
                $.ajax({
                    type: "POST",
                    url: '/mpsi_pos/public/admin/menu/calculate',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "foods[]": arrFood,
                        "quantities[]": arrQty
                    },
                    success: function(data) {
                        $('#price').val(data);
                    }
                });
            });

            $('#food-group').on('keyup click', 'input', function(event) {
                event.preventDefault();
                var foods = $('.foods');
                var arrFood = [];
                var quantities = $('.quantities');
                var arrQty = [];
                for(var i = 0; i < quantities.length; i++){
                    arrQty.push($(quantities[i]).val());
                }
                for(var i = 0; i < foods.length; i++){
                    arrFood.push($(foods[i]).val());
                }
                $.ajax({
                    type: "POST",
                    url: '/mpsi_pos/public/admin/menu/calculate',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "foods[]": arrFood,
                        "quantities[]": arrQty
                    },
                    success: function(data) {
                        $('#price').val(data);
                    }
                });
            });
            var num = 1;
            $('#add-more').click(function() {
                num += 1;
                $('#food-select').append(`
                <div class="row" id="food`+num+`"> 
                    <div  class="col-md-5 col-sm-5 col-xs-11 col-md-offset-3" style="margin-top:10px;">
                        {{ Form::select('food[]', $food, null, ['class' => 'foods form-control col-md-6 col-xs-11', 'placeholder' => 'Choose Food','id'=>'food-sel`+num+`']) }}
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
            });
            var menu = 1;
            $('#add-menu').click(function(event) {
                menu += 1;
                $('#menu-select').append(`
            <div class="row" id="menu`+menu+`">
                <div  class="col-md-5 col-sm-5 col-xs-11 col-md-offset-3" style="margin-top:10px;">
                    {{ Form::select('menu[]', $menu, null, ['class' => 'form-control col-md-7 col-xs-12','placeholder' => 'Choose Menu']) }}
                </div>
                <div  class="col-md-1 col-sm-1 col-xs-1" style="margin-top:10px;">
                    {{ Form::number('quantity[]', 1, ['class' => 'form-control', 'placeholder' => 'qty','min'=>'1']) }}
                </div>
                <button 
                        type="button" 
                        class="btn btn-circle btn-default col-md-1 col-sm-1 col-xs-1" 
                        style="margin-top:10px"
                        onclick="removeAppend('#menu`+menu+`')">&times;</button> 
            </div>
                `);
            });
        });
                function removeAppend(id) {
            $(id).html('');
             var foods = $('.foods');
                var arrFood = [];
                var quantities = $('.quantities');
                var arrQty = [];
                for(var i = 0; i < quantities.length; i++){
                    arrQty.push($(quantities[i]).val());
                }
                for(var i = 0; i < foods.length; i++){
                    arrFood.push($(foods[i]).val());
                }
                $.ajax({
                    type: "POST",
                    url: '/mpsi_pos/public/admin/menu/calculate',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "foods[]": arrFood,
                        "quantities[]": arrQty
                    },
                    success: function(data) {
                        $('#price').val(data);
                    }
                });
        }
    </script>
@endpush