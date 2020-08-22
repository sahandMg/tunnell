<?php

namespace App\Http\Controllers\Remote;

use App\AntPool;
use App\AntPoolData;
use App\F2Pool;
use App\F2PoolData;
use App\Http\Helpers;
use App\Jobs\subscriptionMailJob;
use App\RemoteData;
use App\RemoteId;
use App\RemoteTransaction;
use App\RemoteUser;
use App\SlushPool;
use App\User;
use App\VerifyUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Laravel\Socialite\Facades\Socialite;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RemoteController extends Controller
{


    public function __construct()
    {

    }

    // Gets Miners data by API


    // Shows Miners Data
    public function dashboard(){

        $user = Auth::user();
        return view('panel.index',['user'=>$user]);
    }


    public function tutorials(){

        $user = Auth::user();
        return view('panel.tutorials',['user'=>$user]);
    }

    public function billing(){

        $user = Auth::user();
        return view('panel.billing',['user'=>$user]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */


  public function Transactions(){

//      $transactions = RemoteTransaction::where('user_id',Auth::guard('remote')->id())->where('status','paid')->get();

//      return view('remote.payment.list',compact('transactions'));
  }


}
