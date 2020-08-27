<?php

namespace App\Http\Controllers;



use App\Http\Controllers\PanelResponsables\BillingHandler;
use App\Http\Controllers\PanelResponsables\CreateTokenResponsable;
use App\Http\Controllers\PanelResponsables\Tutorials;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PanelController extends Controller
{

    public function Dashboard(){


        $user =  User::where('id',Auth::id())->with(['wallet','tokens'])->first();
        return view('panel.dashboard',['user'=>$user]);

    }

    public function Tutorials(){

        $user =  User::where('id',Auth::id())->with(['wallet','tokens'])->first();
        return view('panel.tutorials',['user'=>$user]);
//       return new Tutorials();
    }

    public function Billing(){


        $user = User::where('id',Auth::id())->with(['transactions'=>function($query){
            $query->orderBy('id','desc')->get();
        }])->first();

        return view('panel.billing',['user'=>$user]);
//        return new BillingHandler();
    }

    public function ChangeTokenState(Request $request){


        try{
            User::where('temp_token',$request->temp_token)->with(['tokens'=>function($query)use($request){

                $query->where('code',$request->token)->update(['status'=> !$query->where('code',$request->token)->first()->status]);

            }])->firstOrFail();

        }catch (\Exception $e){

            return $e->getMessage();
        }
    }

    public function CreateToken(Request $request){

       return new CreateTokenResponsable();
    }
  public function Transactions(){

//      $transactions = RemoteTransaction::where('user_id',Auth::guard('remote')->id())->where('status','paid')->get();

//      return view('remote.payment.list',compact('transactions'));
  }


}
