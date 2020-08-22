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
    <title>ثبت نام</title>
</head>
<body>
<div>
    <div class="login-container">

        <div class="login-box">
            <div class="box-logo">
                <h1>LOGO HERE</h1>
            </div>
            <form method="POST" action="{{route('signup')}}">
                <h2 class="login-title">ثبت نام</h2>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="name">نام کاربری</label>
                    <input name="name" type="text" class="form-control" required value="{{Request::old('name')}}" id="name"  placeholder="نام کاربری خود را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input name="email" type="email" class="form-control" required value="{{Request::old('email')}}" id="email" aria-describedby="emailHelp" placeholder="ایمیل خود را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="password">کلمه عبور</label>
                    <input name="password" type="password" class="form-control" required id="password" placeholder="کلمه عبور">
                </div>

                <button type="submit" class="btn btn-primary">ثبت نام </button>

                <div class="spacer">
                    <div class="spacer-line"></div> <span class="spacer-text"> یا </span> <div class="spacer-line"></div>
                </div>
                <div class="alter-login">
                    <a href="" class="google"><span class="text"> ثبت نام با گوکل</span> <span class="icon"> <img src="{{URL::asset('images/svg/google.svg')}}" alt=""></span> </a>
                    <a href="" class="github"><span class="text"> ثبت نام با گیت هاب</span> <span class="icon"> <img src="{{URL::asset('images/svg/Github.svg')}}" alt=""></span> </a>
                </div>
            </form>
            <div class="reg-cite">
                <p>قبلا ثبت نام کردید ؟</p>
                <a class="reg-btn" href="{{route('signin')}}">وارد شوید !</a>
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
        @endif
    </div>
</div>
{{--<script src="{{URL::asset('js/auth/login.js')}}"></script>--}}

</body>
</html>