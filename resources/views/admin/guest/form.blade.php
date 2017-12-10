@extends('admin.base.layout')
@section('title')
Guest
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
Guest Form
@endsection

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
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Name','required'=>'required']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Phone</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('phone', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Phone','required'=>'required']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Address','required'=>'required']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success pull-right">Submit</button>
        </div>
    </div>
{!! Form::close() !!}
@endsection