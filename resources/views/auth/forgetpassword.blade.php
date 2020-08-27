<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/signin.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/notification.css')}}">
    <title>ورود</title>
</head>
<body>
<div class="main-container">
    <div class="login-container">
        {{-- Place App Logo or name here --}}
        <div class="login-box">
           <div class="box-logo">
               <h1>LOGO HERE</h1>
           </div>

            <form method="POST" action="{{route('fpass')}}">
                <h2 class="login-title">بازیابی کلمه عبور</h2>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input name="email" type="email" class="form-control" required value="{{Request::old('email')}}" id="email" aria-describedby="emailHelp" placeholder="ایمیل خود را وارد کنید">
                </div>
                <button type="submit" class="btn btn-primary">بازیابی</button>
                <div class="spacer">
                    <div class="spacer-line"></div> <span class="spacer-text"> یا </span> <div class="spacer-line"></div>
                </div>
                <div class="alter-login">
                    <a href="{{route('signin')}}" class="google"><span class="text"> ورود </span>  </a>
                    <a href="{{route('signup')}}" class="github"><span class="text"> ثبت نام</span></a>
                </div>
            </form>

        </div>
        <div class="fpass-image">
            <img src="{{URL::asset('images/svg/key.svg')}}" alt="">
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
        @elseif(session()->has('message'))
            <div class="notif">
                <span onclick="closeNotif(event)" class="close-notif">X</span>
                <p>{{session('message')}}</p>
            </div>
            <script src="{{URL::asset('js/notification/index.js')}}"></script>
        @endif
    </div>
</div>
{{--<script src="{{URL::asset('js/auth/login.js')}}"></script>--}}
</body>
</html>