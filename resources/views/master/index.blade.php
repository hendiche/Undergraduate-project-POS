<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('master.css')
    <style type="text/css">
        .mpsi-popup-img {
            cursor: pointer;
            transition: 0.3s;
        }
        .mpsi-popup-img:hover {
            opacity: 0.7;
        }
        .mpsi-modal-img {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 2000; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }
        .no-img-alt {
            font-size: 50px;
        }
        .mpsi-modal-img-content {
            margin: auto;
            display: block;
            width: 85%;
            max-width: 700px;
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;     
        }
        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 767px){
            .mpsi-modal-img-content {
                width: 95%;
                margin: 0 auto;
            }
        }

    </style>
    @stack('pageStyle')
</head>
<body id="body">
    <div class="mpsi-loading-page">
        <div class="mpsi-center-page">
            <div id="loader"></div>
        </div>
    </div>
    <div class="mpsi-page" style="display: none;">
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top mpsi-nav bg-white" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header mpsi-nav">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hvr-pop" href="{{ route('frontend.home') }}">
                        <img src="http://sariratu.sg/wp-content/themes/twentyfourteen/img/small-logo.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav mpsi-nav-menu">
                        <li><a href="{{ route('frontend.home') }}" class="hvr-underline-from-center"><h3>Home</h3></a></li>
                        <li><a href="{{ route('frontend.about') }}" class="hvr-underline-from-center"><h3>About</h3></a></li>
                        <li><a href="{{ route('frontend.menu') }}" class="hvr-underline-from-center"><h3>Menu</h3></a></li>
                        <li><a href="{{ route('frontend.contact') }}" class="hvr-underline-from-center"><h3>Contact</h3></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-top-links navbar-right">
                        <li class="cart">
                            <a href="{{ route('frontend.cartlist') }}" class="hvr-pulse-grow">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span> {{ Cart::content()->count() }}</span>
                            </a>
                        </li>
                        @guest
                            <li><a href="{{ route('login') }}" class="hvr-float-shadow"><h3 class="margin-bot-0">Login</h3></a></li>
                        @else
                        <li class="dropdown">
                            <a class="dropdown-toggle mpsi-nav" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw fs-x-large"></i><i class="fa fa-caret-down fs-x-large"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
        @yield('content')
        <section id="footer" style="background: url({{ asset('images/footerbg.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-1">
                        <h2>Sari Ratu Restaurant</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu nulla, feugiat at lectus nec, tempor accumsan metus. Vivamus tempus, diam sit amet condimentum pretium, metus magna ornare lectus, ut interdum lorem orci vitae purus. Etiam eleifend vulputate sapien at porta</p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <h2>Our Locations</h2>
                        <div class="mpsi-footer-subtitle">Singapore</div> <!-- ref: https://netdna.webdesignerdepot.com/uploads/dark_web_design/color.jpg -->
                        <p>
                            #20 Pahang Street,<br/>
                            Singapore 198617.<br/>
                            Telp: +65 6294 9983.<br/>
                            Fax: +65 6294 9913<br/>
                            <br/>
                            304, orchard Road.<br/>
                            #02-107 Lucky Plaze,<br/>
                            Singapore.<br/>
                            Telp: +55 6294 9983.<br/>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <h2>Opening Hours</h2>
                        <div class="mpsi-footer-subtitle">Everyday</div>
                        <p>10:00 AM - 09:00 PM</p>
                    </div>
                </div>
                <div class="text-center copyright">
                    <h4>&copy; 2017 SARI RATU, ALL RIGHTS RESERVED.</h4>
                </div>
            </div>
        </section>
    </div> <!-- CLOSE MPSI PAGE -->
    <div id="myImgModal" class="mpsi-modal-img" onclick="closePopupImg()">
        <span class="close" onclick="closePopupImg()">&times;</span>
        <img class="mpsi-modal-img-content text-center no-img-alt" id="content-img" alt="Image cannot be displayed">
    </div>
    @stack('pageModal')

    @include('master.js')
    <script type="text/javascript">
        Number.prototype.formatMoney = function(c, d, t){
        var n = this, 
            c = isNaN(c = Math.abs(c)) ? 2 : c, 
            d = d == undefined ? "." : d, 
            t = t == undefined ? "," : t, 
            s = n < 0 ? "-" : "", 
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
            j = (j = i.length) > 3 ? j % 3 : 0;
           return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        };
        
        function showPopupImg(e) {
            var imgSrc = e.src;
            $('#content-img').attr('src', imgSrc);
            $('#myImgModal').css({
                'display': 'block',
                'overflow' : 'auto'
            });
            $('#body').css('overflow', 'hidden');
        }
        function closePopupImg() {
            $('#myImgModal').css({
                'display': 'none',
                'overflow' : 'hidden'
            });
            $('#body').css('overflow', 'auto');
        }
    </script>
    @stack('pageScript')
</body>
</html>