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
            <p class="form-control col-md-7 col-xs-12">{{ $model->number }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! $status !!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <p class="form-control col-md-7 col-xs-12">{{ $info->name }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer Phone</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <p class="form-control col-md-7 col-xs-12">{{ $info->phone }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer Address</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <p class="form-control col-md-7 col-xs-12">{{ $info->address }}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer Order</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-control col-md-7 col-xs-12" style="height: auto;">
                @foreach($menus as $menu)
                <p>Menu {{$menu->name}} x {{$menu->pivot->quantity}}</p>
                @endforeach
                @foreach($customs as $custom)
                <p>Custom no.{{$custom->id}} x {{$custom->pivot->quantity}}</p>
                <ul>
                    @foreach($custom->foods()->get() as $food)
                    <li>{{$food->name}}</li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Price</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <p class="form-control col-md-7 col-xs-12">Rp.{{ $model->total }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Note</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('note', null, ['size' => '30x5','class' => 'form-control col-md-7 col-xs-12','placeholder'=>'add description','readonly']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success pull-right">Done</button>
        </div>
    </div>
{!! Form::close() !!}
@endsection