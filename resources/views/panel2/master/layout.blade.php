<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Ngrok</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Fontfaces CSS-->
    <!-- <link href="panelAssets/css/font-face.css" rel="stylesheet" media="all"> -->
    <link href="panelAssets/vendor/font-awesome-4.7/css/font-awesome.css" rel="stylesheet" media="all">
    <link href="panelAssets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="panelAssets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="panelAssets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="panelAssets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="panelAssets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="panelAssets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="panelAssets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="panelAssets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="panelAssets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="panelAssets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="panelAssets/css/theme.css" rel="stylesheet" media="all">
    <STYLE>
        @font-face {
            font-family: BYekanFont;
            src: url({{asset('panelAssets/fonts/BYekan.ttf')}});
            /*unicode-range: U+0025-00FF;*/
            /*unicode-range: U+30-39;*/
        }

        /*@font-face {
        font-family: sans-serif;
        src: url({{asset('panelAssets/fonts/BYekan.ttf')}});
      }*/
        * {
            font-family: BYekanFont;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        div {
            font-family: BYekanFont;
        }

        th,
        a,
        p,
        input,
        button,
        legend,
        label,
        span {
            font-family: BYekanFont;
        }

        /*.btn {font-family: sans-serif, BYekanFont;}*/
        .englishFont {
            font-family: sans-serif;
        }
    </STYLE>
</head>

<body class="animsition">
<div class="page-wrapper">

    /*
    <!-- MENU SIDEBAR--> */
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo" style="justify-content: center;">
            <a href="{{route('home')}}">
                <img src="panelAssets/img/farmyar.svg" alt="HashBazaar" style="height: 51px;" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="{{Request::route()->getName() == 'remoteDashboard'?'active has-sub':null}}">
                        <a class="js-arrow" href="{{route('remoteDashboard')}}">
                            <i class="fas fa-tachometer-alt"></i> داشبورد</a>
                    </li>

                    <li class="{{Request::route()->getName() == 'tutorials'?'active has-sub':null}}">
                        <a href="{{route('tutorials')}}">
                            {{--                            <a href="{{route('tutorials',['locale'=>App::getLocale()])}}">--}}
                            <i class="zmdi zmdi-book"></i>آموزش ها</a>
                    </li>

                    <li class="{{Request::route()->getName() == 'billing'?'active has-sub':null}}">
                        <a href="{{route('billing')}}">
                            <i class="far fa-check-square"></i> کیف پول</a>
                    </li>

                    <li>
                        <a href="{{route('logout',['locale'=>App::getLocale()])}}">
                            <i class="zmdi zmdi-power"></i>خروج</a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    /*
    <!-- END MENU SIDEBAR--> */
    /*
    <!-- PAGE CONTAINER--> */
    <div class="page-container">
        /*
        <!-- HEADER DESKTOP--> */
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <div class="header-button">
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="panelAssets/images/avatar.png" alt="John Doe" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn"
                                           href="{{route('remoteDashboard',['locale'=>App::getLocale()])}}">{{$user->name}}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="panelAssets/images/avatar.png" alt="John Doe" />
                                                </a>
                                            </div>

                                            <div class="content">
                                                <h5 class="name">
                                                    <a
                                                            href="{{route('remoteDashboard',['locale'=>App::getLocale()])}}">{{$user->name}}
                                                    </a>
                                                </h5>
                                                <span class="email">{{$user->email}}</span>
                                            </div>

                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{route('remoteDashboard',['locale'=>App::getLocale()])}}">
                                                    <i class="zmdi zmdi-account"></i>حساب کاربری</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a
                                                        href="{{route('billing',['locale'=>App::getLocale()])}}">
                                                    <i class="zmdi zmdi-money-box"></i>پرداخت ها</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="{{route('logout',['locale'=>App::getLocale()])}}">
                                                <i class="zmdi zmdi-power"></i>خروج</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-item clearfix js-item-menu" style="margin-left: 20px;direction: rtl;">
                                <span>+ <span>{{$user->wallet->charge}}</span> تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">

        @yield('bodyContent')
        </div>
    </div>
</div>
        /*
        <!-- Jquery JS--> */
        <script src="panelAssets/vendor/jquery-3.2.1.min.js"></script>
        /*
        <!-- Bootstrap JS--> */
        <script src="panelAssets/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="panelAssets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
        /*
        <!-- Vendor JS       --> */
        <script src="panelAssets/vendor/slick/slick.min.js">
        </script>
        <script src="panelAssets/vendor/wow/wow.min.js"></script>
        <script src="panelAssets/vendor/animsition/animsition.min.js"></script>
        <script src="panelAssets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="panelAssets/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="panelAssets/vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="panelAssets/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="panelAssets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="panelAssets/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="panelAssets/vendor/select2/select2.min.js">
        </script>

        <script src="panelAssets/js/main.js"></script>

        <script type="text/javascript">
            if (screen.width < 920) {
                $('.header-desktop').hide();
            }
        </script>
</body>

</html>