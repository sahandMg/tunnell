<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/conf.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/notification.css')}}">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>تایید ایمیل</title>
</head>
<body>

<div class="box-logo">
    <h1>LOGO HERE</h1>
</div>

<div class="login-container">
    <div class="login-box">
        <div class="login-title">
            <h1>کاربر گرامی، <span> {{ $user->name }}</span></h1>
            <h1>یک ایمیل تایید به آدرس <span>{{$user->email}} </span>ارسال شده است.</h1>
        </div>
        <div class="alter-login">
            <a onclick="sendConfirmationEmail()" href="#" class="google"><span class="text"> ارسال مجدد تاییدیه</span>  </a>
            <a href="{{route('signin')}}" class="google"><span class="text"> ورود </span>  </a>
        </div>
    </div>
    <div class="fpass-image">
        <img src="{{URL::asset('images/png/envelope.png')}}" alt="">
    </div>
</div>
<div class="notif-box">
    @if(session()->has('message'))
    <div class="notif">
        <span onclick="closeNotif(event)" class="close-notif">X</span>
        <p>{{session('message')}}</p>
    </div>
    <script src="{{URL::asset('js/notification/index.js')}}"></script>
    @endif
</div>
<script>
    var token = @json($user->temp_token);
    var url = @json(route('sendMailConfAgain'));
</script>
<script src="{{URL::asset('js/auth/confirmationEmail.js')}}"></script>
</body>
</html>