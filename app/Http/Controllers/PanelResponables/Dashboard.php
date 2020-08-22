<?php

/**
 * Created by PhpStorm.
 * User: Sahand
 * Date: 8/22/20
 * Time: 7:11 PM
 */

namespace App\Http\Controllers\PanelResponsables;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;

class Dashboard implements Responsable {


    public function __construct()
    {

    }

    public function toResponse($request){

        $user = Auth::user()->with('tokens')->with('wallets');

        return view('panel.index',['user'=>$user]);
    }
}

?>