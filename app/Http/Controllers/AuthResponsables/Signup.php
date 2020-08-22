<?php

namespace App\Http\Controllers\AuthResponsables;
use App\Notifications\MailConfirmationNotification;
use App\Token;
use App\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;

class Signup implements Responsable
{
    public function __construct()
    {

    }
    public function toResponse($request){

        try{
            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->temp_token = strtoupper(uniqid());
            $user->verified = 0;
            $user->save();
//            Sending Email notification
            $user->notify(new MailConfirmationNotification($user));
//          Token and wallet will be created in UserObserver
        }catch (\Exception $exception){

            return $exception->getMessage();
        }

        session()->flash('user',$user);

        return redirect()->route('confirmation');
    }
}