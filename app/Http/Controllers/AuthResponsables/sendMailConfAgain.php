<?php

/**
 * Created by PhpStorm.
 * User: Sahand
 * Date: 8/24/20
 * Time: 11:10 AM
 */

namespace App\Http\Controllers\AuthResponsables;

use App\Notifications\ForgetPassNotification;
use App\Notifications\MailConfirmationNotification;
use App\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;

class sendMailConfAgain implements Responsable {

    public function __construct()
    {
        
    }
    
    public function toResponse($request){

        try{

            $token = $request->token;
            $user = User::where('temp_token',$token)->firstOrFail();
            $user->notify(new MailConfirmationNotification($user));
        }catch (\Exception $e){
            return $e->getMessage();
        }

        return 200;
    }
}

?>