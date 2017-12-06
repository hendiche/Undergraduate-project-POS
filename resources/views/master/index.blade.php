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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top mpsi-nav bg-white" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header mpsi-nav">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand hvr-pop" href="#">
                    <img src="http://sariratu.sg/wp-content/themes/twentyfourteen/img/small-logo.png">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav mpsi-nav-menu">
                    <li><a href="#" class="hvr-underline-from-center"><h3>Home</h3></a></li>
                    <li><a href="#" class="hvr-underline-from-center"><h3>About</h3></a></li>
                    <li><a href="#" class="hvr-underline-from-center"><h3>Menu</h3></a></li>
                    <li><a href="#" class="hvr-underline-from-center"><h3>Contact</h3></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-top-links navbar-right">
                    @guest
                        <li><a href="#" class="hvr-float-shadow"><h3 class="margin-bot-0">Login</h3></a></li>
                    @else
                    <li class="dropdown">
                        <a class="dropdown-toggle mpsi-nav" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw fs-x-large"></i><i class="fa fa-caret-down fs-x-large"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href=""><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
    @yield('content')
    <div id="myImgModal" class="mpsi-modal-img" onclick="closePopupImg()">
        <span class="close" onclick="closePopupImg()">&times;</span>
        <img class="mpsi-modal-img-content text-center no-img-alt" id="content-img" alt="Image cannot be displayed">
    </div>

    @include('master.js')
    <script type="text/javascript">
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