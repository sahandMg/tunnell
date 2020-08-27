<?php

namespace App\Helpers;
class GetUserIp
{

    public function __construct()
    {

    }

    public function getIp(){

        try{

            if( isset($_SERVER['HTTP_CF_CONNECTING_IP']) ){
                $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
            } else if( isset($_SERVER['HTTP_X_REAL_IP']) ){
                $ip = $_SERVER['HTTP_X_REAL_IP'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            return $ip;
        }catch (\Exception $e){

        }

    }
}