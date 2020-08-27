<?php

/**
 * Created by PhpStorm.
 * User: Sahand
 * Date: 8/27/20
 * Time: 10:13 PM
 */

namespace App\Http\Controllers\PanelResponsables;

use App\Token;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;

class CreateTokenResponsable implements Responsable {

    public function __construct()
    {
        
    }
    
    public function toResponse($request){

        try{
            $wallet = Auth::user()->wallet;
            if($wallet->charge < env('WALLET_CHARGE_THRESHOLD')){

                return ['type'=>'error','message'=>'حداقل شارژ برای ساخت توکن، '.env('WALLET_CHARGE_THRESHOLD').' تومان می‌باشد'];
            }
            $token = new Token();
            $token->code = strtoupper(uniqid());
            $token->address = env('TUNNEL_IP');
            $token->status = 1;
            $token->user_id = Auth::id();
            $token->save();
            return Auth::user()->tokens;
        }catch (\Exception $exception){

            return $exception->getMessage();
        }

    }
}

?>