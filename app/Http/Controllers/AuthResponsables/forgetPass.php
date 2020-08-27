<?php

/**
 * Created by PhpStorm.
 * User: Sahand
 * Date: 8/24/20
 * Time: 11:10 AM
 */

namespace App\Http\Controllers\AuthResponsables;

use App\Notifications\ForgetPassNotification;
use App\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;

class forgetPass implements Responsable {

    public function __construct()
    {
        
    }
    
    public function toResponse($request){

        try{
            $user = User::where('email',$request->email)->firstOrFail();
            $newPass = uniqid().$user->email;
            $user->update(['password'=>Hash::make($newPass)]);
            $user->notify(new ForgetPassNotification($newPass));
            return redirect()->back()->with(['message'=>'ایمیل بازیابی ارسال شد']);
        }catch (\Exception $exception){

            return redirect()->back()->with(['message'=>'کاربری با این ایمیل یافت نشد']);
        }
    }
}

?>