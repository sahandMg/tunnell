@extends('layouts.master')
@section('features')
    {{--<h2 class="section-title">ویژگی های اپ</h2>--}}
    <div id="#features" class="features">

        <div class="feature-box">
            <div class="feature-img">
                <img src="{{URL::asset('images/svg/raspberry-pi.svg')}}" alt="">
            </div>
            <div class="feature-title">
                {{--<p>Verry GOOD Product</p>--}}
            </div>
            <div class="feature-desc">
                <p>Progressively orchestrate user-centric intellectual capital whereas collaborative technologies. Assertively innovate virtual deliverables through extensive expertise.</p>
            </div>

        </div>

        <div class="feature-box">
            <div class="feature-img">
                <img src="{{URL::asset('images/svg/raspberry-pi.svg')}}" alt="">
            </div>
            <div class="feature-title">
                {{--<p>Verry GOOD Product</p>--}}
            </div>
            <div class="feature-desc">
                <p>Progressively orchestrate user-centric intellectual capital whereas collaborative technologies. Assertively innovate virtual deliverables through extensive expertise.</p>
            </div>

        </div>

        <div class="feature-box">
            <div class="feature-img">
                <img src="{{URL::asset('images/svg/raspberry-pi.svg')}}" alt="">
            </div>
            <div class="feature-title">
                {{--<p>Verry GOOD Product</p>--}}
            </div>
            <div class="feature-desc">
                <p>Progressively orchestrate user-centric intellectual capital whereas collaborative technologies. Assertively innovate virtual deliverables through extensive expertise.</p>
            </div>

        </div>
    </div>
@endsection
