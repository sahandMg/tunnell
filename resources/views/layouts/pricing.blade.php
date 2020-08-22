@extends('layouts.graphics')
@section('pricing')
<div id="pricing" class="pricing-container">
    <div class="pricing">
        <div class="pricing-box">
            <div class="price">
                <p>! Pay As You Go</p>
                <p class="rate">( روز / تومان ۱۰۰۰ )</p>
            </div>
            <div class="box-disc">
                <p>بدون محدودیت استفاده از اپ</p>
                <p> ۵۰۰۰ هزارتومان شارژ هدیه پس از ثبت نام</p>
                <a href="">ثبت نام</a>
            </div>
        </div>
        <img class="stopwatch" src="{{URL::asset('images/svg/stopwatch.svg')}}" alt="">
    </div>
</div>
@endsection