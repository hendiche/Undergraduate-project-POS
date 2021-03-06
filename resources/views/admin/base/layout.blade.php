<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sutibun Nasi Padang</title>

    <!-- Bootstrap -->
    <link href="{{ url('/') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('/') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('/') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ url('/') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    <link href="{{ url('/') }}/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ url('/') }}/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ url('/') }}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="{{ url('/') }}/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ url('/') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!--dropify css-->
    <link rel="stylesheet" href="{{url('/')}}/plugins/bower_components/dropify/dist/css/dropify.min.css">
    <!-- Custom Theme Style -->
    <link href="{{ url('/') }}/build/css/custom.min.css" rel="stylesheet">
    @stack('pageRelatedCss')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('dashboard.index') }}" class="site_title"><i class="fa fa-paw"></i> <span>Sutibun NP</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                {{-- <img src="images/img.jpg" alt="..." class="img-circle profile_img"> --}}
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i>Dashboard</a></li>
                  <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i>User</a></li>
                  <li><a href="{{ route('guest.index') }}"><i class="fa fa-user-circle"></i>Guest</a></li>
                  <li><a href="{{ route('purchase.index') }}"><i class="fa fa-money"></i>Purchase</a></li>
                  <li><a href="{{ route('food.index') }}"><i class="fa fa-cutlery"></i>Food</a></li>
                  <li><a href="{{ route('menu.index') }}"><i class="fa fa-list"></i>Menu</a></li>
                  <li><a href="{{ route('custom.index') }}"><i class="fa fa-random"></i>Custom</a></li>
                  <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('category.index') }}">Category</a></li>
                      <li><a href="{{ route('slider.index') }}">Slider</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{url('/')}}/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>@yield('title')<small>@yield('subtitle')</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-2 col-sm-2 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    @yield('add_button')
                    {{-- <a href="#" class="btn btn-round btn-info">Info</a> --}}
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                @include('shared.custom-error')
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@yield('top_title')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     @yield('content')
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ url('/') }}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ url('/') }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{ url('/') }}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ url('/') }}/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="{{ url('/') }}/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="{{ url('/') }}/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{ url('/') }}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{ url('/') }}/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{ url('/') }}/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ url('/') }}/vendors/moment/min/moment.min.js"></script>
    <script src="{{ url('/') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ url('/') }}/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="{{ url('/') }}/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="{{ url('/') }}/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ url('/') }}/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="{{ url('/') }}/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="{{ url('/') }}/vendors/select2/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">
      function deleteConfirmation(url) {
          $('#delete_form').attr('action', url);
      }
    </script>
    <!-- Parsley -->
    <script src="{{ url('/') }}/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="{{ url('/') }}/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ url('/') }}/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="{{ url('/') }}/vendors/starrr/dist/starrr.js"></script>
    <!-- jQuery file upload -->
    <script src="{{ url('/') }}/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ url('/') }}/build/js/custom.min.js"></script>

    @stack('pageRelatedJs');

  </body>
</html>