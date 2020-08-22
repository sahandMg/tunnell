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

class Tutorials implements Responsable {

    public function __construct()
    {
        
    }
    
    public function toResponse($request){

        $user = Auth::user();
        return view('panel.tutorials',['user'=>$user]);
    }
}

?>