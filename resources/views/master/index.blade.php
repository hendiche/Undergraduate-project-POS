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
    @stack('pageStyle')
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top mpsi-nav bg-white" role="navigation" style="margin-bottom: 0">
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

    @include('master.js')
    @stack('pageScript')
</body>
</html>