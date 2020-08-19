<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/body.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/sectioner.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/pricing.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/customers.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/nav_up.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/contact.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/footer.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <title>اپ</title>
    <style>

    </style>
</head>
<body>
<nav id="#top" class="nav-bar">
    <ul class="auth-ul">
        <li><a class="login" href="">ورود</a></li>
        <li><a class="reg" href="">ثبت نام</a></li>
    </ul>
    <ul class="nav-ul">
        <li><a class="active" href="{{route('home')}}">تونلو</a></li>
        <li><a href="#features">قابلیت ها</a></li>
        <li><a href="#pricing">قیمت</a></li>
        <li><a href="">راه‌حل‌ ها</a></li>
        <li><a href="">آموزش ها</a></li>
    </ul>
    <img class="nav-plugin-text" src="{{URL::asset('images/svg/text.svg')}}" alt="">
    <img class="nav-plugin" src="{{URL::asset('images/svg/navPlugin2.svg')}}" alt="">
</nav>
<header>
    <div class="header-container">
        <div class="terminal-figure">
            <!-- <img class="terminal-window" src="./terminal.svg" alt=""> -->
            <div class="terminalBox">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 493.2 285.36">
                    <defs>
                    </defs>

                    <g class="cls-1">
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <g>
                                    <g>

                                        <rect class="cls-3" x="15.023" y="15.224" width="463.083" height="255.013" rx="10"/>
                                    </g>
                                    <g>
                                        <text  class="cls-4" transform="translate(36.063 97.814)"><tspan id="command2" class="cls-5" x="14.402" y="0"></tspan><tspan x="129.621" y="0"> </tspan></text>
                                        <g id='command2Result'>
                                            <text class="cls-6" transform="translate(52.063 119.382)">nameby YOuuuuuuuu</text>
                                            <text class="cls-4" transform="translate(52.063 144.334)">Session Status online</text>
                                            <text class="cls-7" transform="translate(52.315 168.017)">Account</text>
                                            <text class="cls-7" transform="translate(180.081 168.017)">Mamad</text>
                                            <text class="cls-7" transform="translate(52.459 190.431)">Web Interface</text>
                                            <text class="cls-7" transform="translate(179.781 190.431)">http://127.0.0.1</text>
                                            <text class="cls-7" transform="translate(179.781 215.22)">http://mamad.name.io -&gt; localhost:7000</text>
                                            <text class="cls-7" transform="translate(52.063 212.422)">Forwarding</text>
                                        </g>
                                        <g>
                                            <text class="cls-4" transform="translate(36.063 46.213)"> <tspan id="command1" class="cls-5" x="14.402" y="0"></tspan></text>
                                            <text id='command1Result' class="cls-7" transform="translate(50.654 67.781)">Serving app.js port 7000</text>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>

            <img class="web-window" src="{{URL::asset('images/svg/web.svg')}}" alt="">
        </div>
        <div class="header-description">
            <h1>! تونلو، تونلی در دل دنیا، برای شما</h1>
            <br>
            <h2 class="typewrite" data-type='[ "با تونلو هرجا که هستی به هرچی که داری تونل بزن", "تونلو رو نصب کن کیفش رو ببر"]' data-period="2000">
                <span class="wrap"></span>
            </h2>
            <br>
            <h3>Spend more time programming. One command for an instant, secure URL to your localhost server through any NAT or firewall.</h3>
            <br>
            <a class="cta" href="">! دریافت اشتراک رایگان</a>
        </div>
    </div>

    <img class="plugin" src="{{URL::asset('images/svg/plugin.svg')}}" alt="">
</header>
<div class="body">
    <div class="nav-up">
        <a href="">
            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
        </a>
    </div>
@yield('features')
@yield('graphics')
@yield('pricing')
@yield('customers')
@yield('contact')
@yield('footer')
</div>
<script src="{{URL::asset('js/header/index.js')}}"></script>
<script src="{{URL::asset('js/graphics/index.js')}}"></script>
<script src="{{URL::asset('js/pricing/index.js')}}"></script>
</body>
</html>