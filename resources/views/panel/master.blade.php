<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/panel/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/panel/top_nav.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/panel/side_nav.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/panel/dashboard.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/panel/billing.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/panel/tutorial.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/notification.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/reset.css')}}">
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js" ></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>پنل</title>
</head>
<body>
<nav class="top-nav">
    <ul class="user-ul">
        <li class="name-li" onclick="openInfoWindow(event)">{{$user->name}}
            {{--<i class="fas fa-chevron-down"></i>--}}
        {{--<ul class="user-info-modal-ul">--}}
            {{--<li class="avatar-li">--}}
                {{--<div class="modal-avatar">--}}
                    {{--<img src="{{URL::asset('images/svg/raspberry-pi.svg')}}" alt="">--}}
                {{--</div>--}}
                {{--<div class="modal-user-info">--}}
                    {{--<h3>{{$user->name}}</h3>--}}
                    {{--<h4>{{$user->email}}</h4>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="modal-link"><a href="{{route('remoteDashboard')}}">حساب کاربری<i class="fas fa-user-circle"></i></a></li>--}}
            {{--<li class="modal-link"><a href="{{route('billing')}}">پرداخت ها<i class="fas fa-wallet"></i></a></li>--}}
            {{--<li class="modal-link"> <a href="{{route('logout')}}">خروج<i class="fas fa-sign-out-alt"></i></a></li>--}}
        {{--</ul>--}}
        </li>
        <li class="wallet-charge">شارژ : <span> {{$user->wallet->charge}} </span>تومان</li>
        <li onclick="openTopup(event)" class="charge-btn">خرید شارژ
        <div class="topup">
             <form style="padding: 20px;" method="POST" action="{{route('ZarrinPalPaying')}}">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                   <div class="form-group">
                     <label for="charge">مبلغ به تومان(حداقل ۱۰۰۰ تومان)</label>
                     <input name="charge" type="number"  min="1000"    class="form-control" id="charge">
                   </div>
                    <button type="submit" class="btn">خرید</button>

                   </form>
        </div>
        </li>
    </ul>
    <ul class="logo-ul">
        <li>LOGO HERE</li>
    </ul>
</nav>
<img onclick="opensideMenu()" class="side-nav-trigger" src="{{URL::asset('images/svg/sideTrigger.svg')}}" alt="">
    <div class="panel-container">
        <nav class="side-nav">
            <div class="side-nav-ul-container">
                <ul class="side-ul-avatar">
                    <li>
                        <div class="avatar-container"></div>
                        <p class="charge-side">{{$user->name}}</p>
                        <p class="charge-side">{{$user->wallet->charge}} تومان</p>
                    </li>
                </ul>
                <ul class="side-ul-items">
                    <li><a href="{{route('remoteDashboard')}}">داشبورد<i class="fas fa-tachometer-alt"></i></a></li>
                    <li><a href="{{route('tutorials')}}">آموزش ها<i class="fas fa-book-open"></i></a></li>
                    <li><a href="{{route('billing')}}">پرداخت ها<i class="fas fa-wallet"></i></a></li>
                    <li class="charge-btn-nav"><a  href="#">خرید شارژ<i class="fas fa-battery-three-quarters"></i></a></li>
                    <li><a href="{{route('logout')}}">خروج<i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </div>
        </nav>
        <div onclick="closeTopup()" class="body-container">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="topup">
                        <form style="padding: 20px;" method="POST" action="{{route('ZarrinPalPaying')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="charge">مبلغ به تومان(حداقل ۱۰۰۰ تومان)</label>
                                <input name="charge" type="number"  min="1000"    class="form-control" id="charge">
                            </div>
                            <button type="submit" class="btn">خرید</button>

                        </form>
                    </div>
                </div>

            </div>
            @yield('panelBody')

        </div>
    </div>
<div class="notif-box">
    @if(count($errors->all()) > 0)
        @foreach($errors->all() as $error)
            <div class="notif">
                <span onclick="closeNotif(event)" class="close-notif">X</span>
                <p>{{ $error }}</p>
            </div>
        @endforeach
        <script src="{{URL::asset('js/notification/index.js')}}"></script>
    @endif
</div>
<script src="{{URL::asset('js/panel/index.js')}}"></script>
<script src="{{URL::asset('js/panel/side_nav.js')}}"></script>
</body>
</html>