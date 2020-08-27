<?php
namespace App;
use App\Helpers\GetUserIp;
use App\Notifications\InvoiceMailNotification;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Jalalian;
use Torann\GeoIP\Facades\GeoIP;

class Zarrin
{

    public $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }
    public function create(){

        $amount = $this->request['charge'];
        $data = array('MerchantID' => env('ZARRIN_TOKEN'),
            'Amount' => $amount,
            'CallbackURL' => env('ZARRIN_CALLBACK'),
            'Description' => env('APP_NAME').'شارژ کیف پول ');
        $jsonData = json_encode($data);
        $ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true);
        curl_close($ch);
        if ($err) {
            return 404;
        } else {
            if ($result["Status"] == '100' ) {


                $trans = new Transaction();
                $trans->order_num = 'TN_'.rand(1000,22000);
                $trans->status = 'unpaid';
                $trans->amount = $amount;
                $trans->authority = $result['Authority'];
//                $trans->country = geoip()->getLocation(geoip()->getClientIP());
                $trans->country = 'IR';
                $trans->user_id = Auth::id();
                $trans->save();

                return $result;
            } else {
                return 404;
            }
        }

    }

    public function verify(){

        $transactionId = $this->request['Authority'];
        $trans = Transaction::where('authority',$transactionId)->first();
        if(is_null($trans)){
            return 'کد تراکنش نادرست است';
        }
        if($trans->status == 'paid'){
            return 'تراکنش تکراری است';
        }

        $data = array('MerchantID' => env('ZARRIN_TOKEN'), 'Authority' => $transactionId, 'Amount'=>$trans->amount);
        $jsonData = json_encode($data);
        $ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        if ($err) {
            return "cURL Error #:" . $err;
        } else {

            if ($result['Status'] == '100') {

                $this->ZarrinPaymentConfirm($trans);

                return redirect()->route('successPayment',['transid'=>$trans->order_num]);

            } else {

                Transaction::where('order_num', $trans->order_num)->update([
                    'status' => 'canceled'
                ]);
                return redirect()->route('FailedPayment', ['transid' => $trans->order_num]);
            }
        }
    }
    private function ZarrinPaymentConfirm($trans)
    {

        try{

            $trans = Transaction::where('id', $trans->id)->with('user')->firstOrFail();

            $trans->update([
                'status' => 'paid'
            ]);
            $trans->user->wallet->update(['charge'=> $trans->user->wallet + $trans->amount]);

            $trans->user->update(['tokens_disabled' => 0]);

        }catch (\Exception $e){

            return $e->getMessage();
        }
        $trans->user->notify(new InvoiceMailNotification($trans));

        $data = ['trans'=>$trans];

//        TODO email invoice

        Mail::send('emails.invoiceMail',$data,function($message){

            $message->to(env('SAILS_MAIL'));
            $message->from(env('NoReply'));
            $message->subject('شارژ کیف پول');
        });


    }

}
