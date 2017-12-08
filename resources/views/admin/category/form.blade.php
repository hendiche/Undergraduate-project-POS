@extends('admin.base.app')

@if(empty($model))
    @section('page_header','Create Category')
@else
    @section('page_header','Edit Category')
@endif

@section('breadcrumblv2')
    @if(empty($model))
        <li>Category</li>
        <li class="active">Create</li>
    @else
        <li>Category</li>
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