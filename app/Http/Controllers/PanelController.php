<?php

namespace App\Http\Controllers;



use App\Http\Controllers\PanelResponsables\BillingHandler;
use App\Http\Controllers\PanelResponsables\Tutorials;
use Illuminate\Support\Facades\Auth;


class PanelController extends Controller
{

    public function Dashboard(){

        $user = Auth::user()->with('tokens')->with('wallet')->first();

        return view('panel.index',['user'=>$user]);
//       return new Dashboard();
    }

    public function Tutorials(){

//       return new Tutorials();
    }

    public function Billing(){

        $user = Auth::user()->with('tokens')->with('wallet')->with('transactions')->first();

        return view('panel.billing',['user'=>$user]);
//        return new BillingHandler();
    }

  public function Transactions(){

//      $transactions = RemoteTransaction::where('user_id',Auth::guard('remote')->id())->where('status','paid')->get();

//      return view('remote.payment.list',compact('transactions'));
  }


}
