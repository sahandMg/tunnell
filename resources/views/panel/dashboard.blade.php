@extends('panel.master')
@section('panelBody')
    <div class="dashboard-container">
        <div class="token-btn">
            <button onclick="createToken(event)"><span class="fas fa-plus"></span> ساخت توکن </button>
        </div>
        <br>
        <div style="display: {{$user->tokens_disabled == 1 ?'block':'none'}}" class="charge-alert">
            <p>سرویس شما به دلیل نداشتن اعتبار مسدود شده است. جهت فعال‌سازی، کیف پول خود را شارژ نمایید</p>
        </div>
            <div class="table-container">
                <table class="token-table">
                    <caption class="table-title">لیست توکن ها</caption>
                    <thead>
                        <tr>
                            <td>تاریخ ساخت</td>
                            <td>آدرس</td>
                            <td>وضعیت</td>
                            <td>توکن</td>
                            <td>ردیف</td>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($user->tokens as $index=>$token)
                        <tr class="text-center">
                            <td>{{\Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($token->created_at))->format('Y-m-d')}}</td>
                            <td>{{$token->address}}</td>
                            {{--<td>{{$token->status == 1?'فعال':'خاموش'}}</td>--}}
                            @if($user->tokens_disabled == 1)
                                <td style="color: darkred">مسدود</td>
                            @else
                                <td onclick="changeStatus(event,{{json_encode($user->temp_token)}},{{json_encode($token->code)}})" class="{{$token->status == 1?'green-status-td':'red-status-td'}}"></td>
                            @endif
                            <td>{{$token->code}}</td>
                            <td>{{$index+1}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="table-container-vertical">

                <table class="token-table-vertical">
                    <caption class="table-title">لیست توکن ها</caption>

                    <tbody>

                    @foreach($user->tokens as $index=>$token)

                        <tr>
                            <td>{{$index+1}}</td>
                            <td>ردیف</td>
                        </tr>
                        <tr>
                            <td>{{$token->code}}</td>
                            <td>توکن</td>
                        </tr>
                        @if($user->tokens_disabled == 1)
                            <tr style="color: darkred">
                                <td>مسدود</td>
                                <td>وضعیت</td>
                            </tr>
                        @else
                            <tr>
                                <td onclick="changeStatus(event,{{json_encode($user->temp_token)}},{{json_encode($token->code)}})" class="{{$token->status == 1?'green-status-td':'red-status-td'}}"></td>
                                <td>وضعیت</td>
                            </tr>
                        @endif
                        <tr>
                            <td>{{$token->address}}</td>
                            <td>آدرس</td>
                        </tr>
                        <tr>
                            <td>{{\Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($token->created_at))->format('Y-m-d')}}</td>
                            <td>تاریخ ساخت</td>

                        </tr>

                        <tr style="background-color: white">
                            <td></td>
                            <td></td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>
            </div>
    </div>
    <script>
        var tokenStateURL = @json(route('tokenState'));
        var createTokenURL = @json(route('createToken'));
    </script>
@endsection