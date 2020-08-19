@extends('layouts.pricing')
@section('contact')
<div class="contact-container">
    <div class="contact-form">
         <form style="padding: 20px;" method="POST" action="{{route('contact')}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="form-group">
                 <label for="name">نام و نام خانوادگی</label>
                 <input name="username" type="text" required value="{{Request::old('username')}}" class="form-control" id="name" aria-describedby="emailHelp" placeholder="نام خود را وارد کنید">
               </div>

               <div class="form-group">
                 <label for="email">ایمیل</label>
                 <input name="email" type="email" required class="form-control" value="{{Request::old('email')}}" id="email" aria-describedby="emailHelp" placeholder="ایمیل خود را وارد کنید">
               </div>

             <div class="form-group">
                 <label for="message">متن پیام</label>
                 <textarea name="userMsg" id="message" cols="50" required   rows="10" placeholder="پیام شما"></textarea>
             </div>

                <button type="submit" class="btn btn-primary">ارسال </button>

               </form>
    </div>
    <div class="contact-image">
        <img src="{{URL::asset('images/svg/contact.svg')}}" alt="">
    </div>
</div>
@endsection