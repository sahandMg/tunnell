@extends('panel.master')
@section('panelBody')
    <div class="billing-container">
        <table class="token-table">
            <caption class="table-title">لیست تراکنش ها</caption>
            <thead>
            <tr>
                <td>تاریخ</td>
                <td>کد پیگیری</td>
                <td>وضعیت</td>
                <td>مبلغ</td>
                <td>ردیف</td>
            </tr>
            </thead>
            <tbody>
            @foreach($user->transactions as $index=>$transaction)
                <tr class="text-center">
                    <td>{{\Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($transaction->created_at))->format('Y-m-d')}}</td>
                    <td>{{$transaction->order_num}}</td>
                    <td style="{{$transaction->status == 'paid'?'color:green':($transaction->status == 'canceled'?'color:gray':'color:red')}}">{{$transaction->status == 'paid'?'موفق':($transaction->status == 'canceled'?'لغو':'ناموفق')}}</td>
                    <td><span>{{$transaction->amount}}</span> تومان</td>
                    <td><span>{{$index+1}}</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <table class="token-table-vertical">
            <caption class="table-title">لیست توکن ها</caption>

            <tbody>

            @foreach($user->transactions as $index=>$transaction)

                <tr>
                    <td>{{$index+1}}</td>
                    <td>ردیف</td>
                </tr>
                <tr>
                    <td><span>{{$transaction->amount}}</span></td>
                    <td>مبلغ</td>
                </tr>
                <tr>
                    <td style="{{$transaction->status == 'paid'?'color:green':($transaction->status == 'canceled'?'color:gray':'color:red')}}">{{$transaction->status == 'paid'?'موفق':($transaction->status == 'canceled'?'لغو':'ناموفق')}}</td>
                    <td>وضعیت</td>
                </tr>
                <tr>
                    <td>{{$transaction->order_num}}</td>
                    <td>کد پیگیری</td>

                </tr>
                <tr>
                    <td>{{\Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($transaction->created_at))->format('Y-m-d')}}</td>
                    <td>تاریخ</td>

                </tr>

                <tr style="background-color: white">
                    <td></td>
                    <td></td>
                </tr>

            @endforeach

            </tbody>

        </table>
    </div>
@endsection