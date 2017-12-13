@extends('master.index')
@push('pageStyle')
<style type="text/css">
    .panel-heading.cursor-pointer.hvr-buzz-out {
        display: block;
    }
    .menu-img{
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .name-desc{
        background-color:  #ffffff;
        text-align: center;
        padding: 15px;
    }
    .name-desc h4{
        margin-left: 10px;
        color:#17A827;
    }
    .name-desc h3{
        color: #808080;
    }
    .name-desc p{
        color: #808080;
        text-align: left;
        margin-left: 10px;
    }
    .food{
        padding: 20px; 
        width: 150px;
        height: 150px;
        font-size: 30px;
        text-align: center;
        text-decoration: none;
        margin : 5px 2px;
        border-radius:50%;
        background-color: #ffffff;
    }
    .fa-cutlery{
        color: #17A827;
    }
    .fa-cutlery:hover{
        color: #999999;
         text-decoration: none;
    }
    #menu-container {
        margin: 20px 0;
    }
</style>
@endpush
@section('content')
<section id="menu">
	<div class="container-fuid">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                <a href="{{ route('frontend.custom') }}" class="fa fa-cutlery food"> Custom Menu</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" id="menu-container">        
            @foreach($menu as $data)
                <div class="col-md-3 col-sm-6 col-xs-12" id="menu-card">
                    <div class="image">
                        <img src="{{ $data->cover }}" title="{{ $data->cover }}" class="menu-img" />
                        <div class="description name-desc">
                            <h4 class="no-margin-top">{{ $data['name'] }}</h4>
                            <p style="background-color: ">{{ $data['description'] }}</p>
                            <h3 class="text-center">Rp{{ number_format($data['price'], 2, ",", '.') }}</h3>
                        </div>
                        <div class="button-cart">
                            <a href="{{ route('frontend.product', ['id' => $data['id']]) }}" class="btn btn-default hvr-overline-from-center">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                <span>Add to cart</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
@push('pageScript')
<script type="text/javascript">
    $(document).ready(function() {
        $('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');
    });
</script>
@endpush