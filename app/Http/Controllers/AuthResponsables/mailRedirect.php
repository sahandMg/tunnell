<?php

namespace App\Http\Controllers\AuthResponsables;

use App\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Session;

class mailRedirect implements Responsable {

    public function __construct()
    {
        
    }
    
    public function toResponse($request){

        try{
            $user = User::where('temp_token',$request->id)->firstOrFail();
            if($user->verified == 1){
                return 'token expired';
            }
            $user->update(['verified'=>1]);
            session()->flash('message','حساب شما فعال شد');
            return redirect()->route('signin');
        }catch (\Exception $exception){

            return '?';
        }
    }
}

?>