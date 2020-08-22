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
<div class="login-container">

    <div class="login-box">
        <div class="box-logo">
            <h1>LOGO HERE</h1>
        </div>
         <form method="POST" action="{{route('signin')}}">
             <h2 class="login-title">ورود</h2>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="form-group">
                 <label for="email">ایمیل</label>
                 <input name="email" type="email" required class="form-control" value="{{Request::old('email')}}" id="email" aria-describedby="emailHelp" placeholder="ایمیل خود را وارد کنید">
               </div>
               <div class="form-group">
                 <label for="password">کلمه عبور</label>
                 <input name="password" type="password" required class="form-control" id="password" placeholder="کلمه عبور">
               </div>

                <button type="submit" class="btn btn-primary">ورود </button>

                <a class="forget" href="{{route('fpass')}}">کلمه عبور را فراموش کردم </a>
                <div class="spacer">
                    <div class="spacer-line"></div> <span class="spacer-text"> یا </span> <div class="spacer-line"></div>
                </div>
                 <div class="alter-login">
                     <a href="" class="google"><span class="text"> ورود با گوکل</span> <span class="icon"> <img src="{{URL::asset('images/svg/google.svg')}}" alt=""></span> </a>
                     <a href="" class="github"><span class="text"> ورود با گیت هاب</span> <span class="icon"> <img src="{{URL::asset('images/svg/Github.svg')}}" alt=""></span> </a>
                 </div>
         </form>
        <div class="reg-cite">
            <p>ثبت نام نکردید ؟</p>
            <a class="reg-btn" href="{{route('signup')}}">ثبت نام کنید !</a>
        </div>

    </div>
    <div class="login-image">
        <img src="{{URL::asset('images/svg/tunnelView.svg')}}" alt="">
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

{{--<script src="{{URL::asset('js/auth/login.js')}}"></script>--}}
</body>
</html>