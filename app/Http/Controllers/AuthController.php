<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthResponsables\forgetPass;
use App\Http\Controllers\AuthResponsables\mailRedirect;
use App\Http\Controllers\AuthResponsables\sendMailConfAgain;
use App\Http\Requests\forgetPassRequest;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SingupRequest;
use App\Notifications\ForgetPassNotification;
use App\Notifications\MailConfirmationNotification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthResponsables\Signup;
use App\Http\Controllers\AuthResponsables\Signin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

      return new sendMailConfAgain();
    }

    public function forgetPassword(){

        return view('auth.forgetpassword');
    }

    public function post_forgetPassword(forgetPassRequest $fr){

       return new forgetPass();
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('home');
    }
}
