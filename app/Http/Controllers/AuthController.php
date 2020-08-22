<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthResponsables\mailRedirect;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SingupRequest;
use App\Notifications\MailConfirmationNotification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthResponsables\Signup;
use App\Http\Controllers\AuthResponsables\Signin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(){

        return view('auth.signup');
    }
    public function post_signup(Request $request,SingupRequest $sg){

        return new Signup();
    }

    public function confirmation(){

        if (!session()->has('user')){
            return redirect()->route('signin');
        }
        return view('auth.confirmEmail',['user'=>session('user')]);
    }

    public function signin(){

        return view('auth.signin');
    }
    public function post_signin(Request $request, SigninRequest $sg){

        return new Signin();
    }

    public function mailConfirmation(Request $request){

        return new mailRedirect();
    }

    public function sendMailConfAgain(Request $request){

        try{

            $token = $request->token;
            $user = User::where('temp_token',$token)->firstOrFail();
            $user->notify(new MailConfirmationNotification($user));
        }catch (\Error $e){

            return $e->getMessage();
        }

        return 200;
    }

    public function forgetPassword(){

        return view('auth.forgetpassword');
    }

    public function post_forgetPassword(){

        return view('auth.forgetpassword');
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('home');
    }
}
