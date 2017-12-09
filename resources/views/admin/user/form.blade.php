@extends('admin.base.layout')
@section('title')
User
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
Create User
@endsection

@section('content')
<!-- .row -->
<div class="row">
{!! Form::model($model, [
        'url' => $route,
        'method' => $method,
        'id' => 'remarkForm',
        'class' => 'form-horizontal form-label-left',
        'files' => true
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
            {{ Form::number('phone', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Phone number','required'=>'required','min'=>'0']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::email('email', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Email','required'=>'required']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Address','required'=>'required']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('roles',
                [
                    "0"=>"admin",
                    "1"=>"user"
                ],
                null,
                ['class' => 'form-control col-md-7 col-xs-12'])
            }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::password('password', ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'User Password']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Confirm Password</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::password('confirm_new_password', ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Confirm Password']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success pull-right">Submit</button>
        </div>
    </div>
{!! Form::close() !!}
@endsection