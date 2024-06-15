<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Title Page-->
    <title>@yield('page_title') - {{ config('app.name') }}</title>


    <!-- Fontfaces CSS-->
    <link href="{{asset("assets/css/font-face.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/font-awesome-4.7/css/font-awesome.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/font-awesome-5/css/fontawesome-all.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/mdi-font/css/material-design-iconic-font.min.css")}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset("assets/vendor/bootstrap-4.1/bootstrap.min.css")}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset("assets/vendor/animsition/animsition.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/wow/animate.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/css-hamburgers/hamburgers.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/slick/slick.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/select2/select2.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("assets/vendor/perfect-scrollbar/perfect-scrollbar.css")}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset("assets/css/theme.css")}}" rel="stylesheet" media="all">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @extends('layouts.mobile-header');
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @extends('layouts.desktop-sidebar');
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name }}
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield('content')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © {{date('Y')}} {{ config('app.name') }}. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset("assets/vendor/jquery-3.2.1.min.js")}}"></script>
    @stack('ajax-js')
    <!-- Bootstrap JS-->
    <script src="{{asset("assets/vendor/bootstrap-4.1/popper.min.js")}}"></script>
    <script src="{{asset("assets/vendor/bootstrap-4.1/bootstrap.min.js")}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset("assets/vendor/slick/slick.min.js")}}">
    </script>
    <script src="{{asset("assets/vendor/wow/wow.min.js")}}"></script>
    <script src="{{asset("assets/vendor/animsition/animsition.min.js")}}"></script>
    <script src="{{asset("assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js")}}">
    </script>
    <script src="{{asset("assets/vendor/counter-up/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("assets/vendor/counter-up/jquery.counterup.min.js")}}">
    </script>
    <script src="{{asset("assets/vendor/circle-progress/circle-progress.min.js")}}"></script>
    <script src="{{asset("assets/vendor/perfect-scrollbar/perfect-scrollbar.js")}}"></script>
    <script src="{{asset("assets/vendor/chartjs/Chart.bundle.min.js")}}"></script>
    <script src="{{asset("assets/vendor/select2/select2.min.js")}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset("assets/js/main.js")}}"></script>

</body>

</html>
<!-- end document-->
