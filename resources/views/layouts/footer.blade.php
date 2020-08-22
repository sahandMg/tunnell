@extends('layouts.contact')
@section('footer')
<div class="footer-container">
    <div class="footer-about">
        <img src="{{URL::asset('images/svg/raspberry-pi.svg')}}" alt="">
        <p>
            Globally enable team building expertise and scalable human capital. Conveniently evolve magnetic process improvements whereas effective infrastructures. Dynamically network emerging processes via diverse best practices.
        </p>
    </div>
    <div class="footer-links">
        <h3><i class="fas fa-link" aria-hidden="true"></i> لینک ها </h3>
        <div class="link-container">
            <ul>
                <li><a href="">لینک۱</a></li>
                <li><a href="">لینک۲</a></li>
                <li><a href="">لینک۳</a></li>
            </ul>
            <ul>
                <li><a href="">لینک۴</a></li>
                <li><a href="">لینک۵</a></li>
                <li><a href="">لینک۶</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-contact">
        <h3><i class="fas fa-link" aria-hidden="true"></i> راه های ارتباطی </h3>
        <div class="contact-item">
            <img src="{{URL::asset('images/svg/mail.svg')}}" alt="">
            <a href="mailto:info@app.com">info@app.com</a>
        </div>
        <div class="contact-item">
            <img src="{{URL::asset('images/svg/instagram.svg')}}" alt="">
            <img src="{{URL::asset('images/svg/telegram.svg')}}" alt="">
            <img src="{{URL::asset('images/svg/whatsapp.svg')}}" alt="">

        </div>
    </div>
</div>
@endsection