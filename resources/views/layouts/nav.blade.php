@extends('layouts.master')
@section('nav')
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
    <nav class="burger-nav" onclick="openMenu()">

        <ul class="burger-nav-ul">
            <li><a class="active" href="{{route('home')}}">تونلو</a></li>
            <li><a href="#features">قابلیت ها</a></li>
            <li><a href="#pricing">قیمت</a></li>
            <li><a href="">راه‌حل‌ ها</a></li>
            <li><a href="">آموزش ها</a></li>
            <li><a class="login" href="">ورود</a></li>
            <li><a class="reg" href="">ثبت نام</a></li>
        </ul>
        <img onclick="triggerMenu()" class="burger-trigger" src="{{URL::asset('images/svg/trigger.svg')}}" alt="">
        <img class="burger-plugin-text" src="{{URL::asset('images/svg/burgerText.svg')}}" alt="">
        <img class="burger-plugin" src="{{URL::asset('images/svg/burgerPlugin.svg')}}" alt="">
    </nav>
@endsection