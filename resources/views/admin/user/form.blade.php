@extends('admin.base.app')

@if(empty($model))
    @section('page_header','Create User')
@else
    @section('page_header','Edit User')
@endif

@section('breadcrumblv2')
    @if(empty($model))
        <li>User</li>
        <li class="active">Create</li>
    @else
        <li>User</li>
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
                            <label for="name" class="col-md-12">Name</label>
                            <div class="col-md-12">
                              {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name','required'=>'required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber" class="col-md-12">Phone number</label>
                            <div class="col-md-12">
                              {{ Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'Contact number','required'=>'required','min'=>'0']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                              {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email','required'=>'required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nric" class="col-md-12">Address</label>
                            <div class="col-md-12">
                              {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address','required'=>'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Role</label>
                            <div class="col-sm-12">
                                {{ Form::select('roles',
                                    [
                                        "0"=>"admin",
                                        "1"=>"user"
                                    ],
                                    null,
                                    ['class' => 'form-control'])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12">Password</label>
                            <div class="col-md-12">
                              {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'User Password']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                              {{ Form::password('confirm_new_password', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
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