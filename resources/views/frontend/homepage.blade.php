@extends('master.index')
@push('pageStyle')
<style type="text/css">
    .panel-heading.cursor-pointer.hvr-buzz-out {
        display: block;
    }
</style>
@endpush
@section('content')
  <section>
    <div>
        <div>
            <div>
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="https://i.ytimg.com/vi/dGFSjKuJfrI/maxresdefault.jpg" alt="Los Angeles">
                  </div>

                  <div class="item">
                    <img src="https://i.ytimg.com/vi/prALrHUJ8Ns/hqdefault.jpg" alt="Chicago">
                  </div>
                
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCADSWXh9jUjoQowEKSGjg-eynpDWl9dtBCQ6RIfF0O-DOazLEtQ" alt="New york">
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control mpsi-left-carousel mpsi-animation-duration" href="#myCarousel" data-slide="prev" style="display: none;">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control mpsi-right-carousel mpsi-animation-duration" href="#myCarousel" data-slide="next" style="display: none">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <h1 class="text-center fs-45">ABOUT</h1>
        <br/>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12" id="about-left">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <img src="http://sariratu.sg/wp-content/uploads/2015/04/21.jpg" class="mpsi-popup-img hvr-grow" onclick="showPopupImg(this)">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <img src="http://sariratu.sg/wp-content/uploads/2015/04/22.jpg" class="mpsi-popup-img hvr-grow" onclick="showPopupImg(this)">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <img src="http://sariratu.sg/wp-content/uploads/2015/04/33.jpg" class="mpsi-popup-img hvr-grow" onclick="showPopupImg(this)">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <img src="http://sariratu.sg/wp-content/uploads/2015/04/44.jpg" class="mpsi-popup-img hvr-grow" onclick="showPopupImg(this)">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="about-right">
                <div class="text-center">
                    <h1 class="no-margin-top">Sari ratu is a Authentic NASI PADANG</h1>
                    <div class="mpsi-hr">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <p>Nasi Padang is a Padang steamed rice served with various choices of pre-cooked dishes originated from Padang city, the capital of West Sumatra, Indonesia. Nasi Padang (Padang-style rice) is a miniature banquet of meats, fish, vegetables, and spicy sambals eaten with plain white rice, it is Sumatra’s most famous export and the Minangkabau’s great contribution to Indonesian cuisine.</p>
                    <br />
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading cursor-pointer hvr-buzz-out" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            <h4 class="panel-title">Our Main Dish</h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">OUR MAIN DISHES ARE NASI PUTIH,GULAI KAMBING,SOP BUNTUT,AYAM POP,AYAM BAKAR,IKAN MASIN,GULAI TELOR IKAN,IKAN NILA,IKAN BAWAL BAKAR,BABY KAILAN,UDANG PETAI,TELOR GULAI,SOP BUNTUT and etc….</div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading cursor-pointer hvr-buzz-out" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                            <h4 class="panel-title">Parking Facilitis</h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">Car Parking / 2 wheeler parking is Avilable for customers.</div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading cursor-pointer hvr-buzz-out" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                            <h4 class="panel-title">Number Of Seats</h4>
                          </div>
                          <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">We have Sit-In Capacity of 100 Pax.</div>
                          </div>
                        </div>
                      </div> 
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success hvr-icon-wobble-horizontal mpsi-btn-more">MORE ABOUT US</button>
    </div>
</section>
<section id="menu">
    <div class="container-fluid">
        <h1 class="text-center fs-45">MENU</h1>
        <br />
        <div class="row">
            @php
            $menus = [[
                    "img" => "http://sariratu.sg/wp-content/uploads/2015/04/Menu2.jpg",
                    "name" => "Daging Cincang (Beef In Curry)",
                    "price" => "20000"
                ], 
                [
                    "img" => "http://sariratu.sg/wp-content/uploads/2015/04/Menu4.jpg",
                    "name" => "Ikan Gulai (Fish in Curry)",
                    "price" => "20000"
                ],
                [
                    "img" => "http://sariratu.sg/wp-content/uploads/2015/04/Menu7.jpg",
                    "name" => "Sambang Goreng",
                    "price" => "20000"
                ],
                [
                    "img" => "http://sariratu.sg/wp-content/uploads/2015/04/Menu21.jpg",
                    "name" => "Sayur Nangka",
                    "price" => "20000"
                ]];
            @endphp
            @foreach($menus as $index => $menu)
                <div class="col-md-3 col-sm-6 col-xs-12" id="menu-card">
                    <div>
                        <div class="image">
                            <img src="{{ $menu['img'] }}" title="{{ $menu['name'] }}" />
                        </div>
                        <div class="description">
                            <h4 class="no-margin-top">{{ $menu['name'] }}</h4>
                            <p>bacot bacot bacot bacot bacot bacot bacot It is a long established fact that a reader</p>
                            <h3 class="text-center">Rp{{ number_format($menu['price'], 2, ",", '.') }}</h3>
                        </div>
                        <div class="button-cart">
                            <button class="hvr-overline-from-center">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-success hvr-icon-wobble-horizontal mpsi-btn-more">MORE MENU</button>
    </div>
</section>
@endsection
@push('pageScript')
<script type="text/javascript">
    $(document).ready(function() {
        $('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');
        
        $('#myCarousel')
        .mouseenter(function() {
            $('.mpsi-left-carousel').addClass('animated fadeInLeft').css('display', 'block');
            $('.mpsi-right-carousel').addClass('animated fadeInRight').css('display', 'block');
        })
        .mouseleave(function() {
            $('.mpsi-left-carousel').addClass('fadeOutLeft').removeClass('fadeInLeft');
            // $('.mpsi-left-carousel').removeClass('animated fadeInLeft mpsi-animation-duration').css('visibility', 'hidden');
            $('.mpsi-right-carousel').addClass('fadeOutRight').removeClass('fadeInRight');
            setTimeout(function() {
                $('.mpsi-left-carousel').removeClass('animated fadeOutLeft').css('display', 'none');
                $('.mpsi-right-carousel').removeClass('animated fadeOutRight').css('display', 'none');
            }, 350);
        });

        $('.carousel').carousel({
            interval: 2000
        });
        $('.carousel-control.right').trigger('click');
    });
</script>
@endpush
