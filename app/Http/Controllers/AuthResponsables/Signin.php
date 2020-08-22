<?php

namespace App\Http\Controllers\AuthResponsables;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;

class Signin implements Responsable
{
    public function __construct()
    {

    }
    public function toResponse($request){

        $cred = $request->all();
        unset($cred['_token']);
        if(Auth::attempt($cred)){
            if(Auth::user()->verified == 0){

                session()->flash('user',Auth::user());
                session()->flash('message','لطفا ایمیل خود را تایید نمایید');
                return redirect()->route('confirmation');
            }

            return redirect()->route('remoteDashboard');
        }else{
            session()->flash('message','ایمیل و یا کلمه عبور نادرست است');
            return redirect()->back();
        }

    }
}