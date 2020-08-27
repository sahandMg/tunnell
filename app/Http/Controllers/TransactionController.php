<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Zarrin;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function ZarrinPalPaying(Request $request){

        $this->validate($request,[
            'charge'=>'gte:1000'
        ]);
        $zarrin = new Zarrin($request->all());
        $result = $zarrin->create();
        if($result != 404){
            $request->session()->save();
            return redirect()->to('https://www.zarinpal.com/pg/StartPay/' . $result["Authority"]);
        }else{
            return 'مشکلی در پرداخت پیش آمده';
        }
    }

    public function ZarrinCallback(Request $request){

        $zarrin = new Zarrin($request->all());

        return $zarrin->verify();
    }

    public function successPayment($id){

        $trans = Transaction::where('order_num',$id)->first();
        if(is_null($trans)){
            return 'تراکنش نامعتبر';
        }
        $code = $trans->order_num;
        return view('transactions.paymentSuccess',compact('code'));
    }

    public function failedPayment($id){
        $trans = Transaction::where('order_num',$id)->first();
        if(is_null($trans)){
            return 'تراکنش نامعتبر';
        }
        $code = $trans->order_num;
        return view('transactions.paymentFailed',compact('code'));
    }

}
