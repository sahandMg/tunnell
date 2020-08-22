<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test',function(){

//    \Illuminate\Support\Facades\Mail::send('auth.confirmEmail',[],function($message){
//        $message->to('s27.moghadam@gmail.com');
//        $message->from('support@joyvpn.xyz');
//        $message->subject('ایمیل تایید');
//    });
    return view('panel.index');
});
Route::get('/', function () {
    return view('layouts.footer');
})->name('home');
Route::get('contact',function(){})->name('contact');


Route::group(['middleware'=>'guest'],function(){

    Route::get('mail-redirect',[\App\Http\Controllers\AuthController::class,'mailConfirmation'])->name('mailConfirmation');
    Route::post('send-conf-email-again',[\App\Http\Controllers\AuthController::class,'sendMailConfAgain'])->name('sendMailConfAgain');

    Route::get('signup',[\App\Http\Controllers\AuthController::class,'signup'])->name('signup');
    Route::post('signup',[\App\Http\Controllers\AuthController::class,'post_signup'])->name('signup');

    Route::get('confirmation',[\App\Http\Controllers\AuthController::class,'confirmation'])->name('confirmation');

    Route::get('signin',[\App\Http\Controllers\AuthController::class,'signin'])->name('signin');
    Route::post('signin',[\App\Http\Controllers\AuthController::class,'post_signin'])->name('signin');

    Route::get('fpass',[\App\Http\Controllers\AuthController::class,'forgetPassword'])->name('fpass');
    Route::post('fpass',[\App\Http\Controllers\AuthController::class,'post_forgetPassword'])->name('fpass');


});

// ========================== Remote Pages Routes ===========================
Route::group(['middleware'=>'auth'],function(){


    Route::get('dashboard',[\App\Http\Controllers\PanelController::class,'Dashboard'])->name('remoteDashboard');

    Route::get('billing',[\App\Http\Controllers\PanelController::class,'Billing'])->name('billing');

    Route::get('tutorials',[\App\Http\Controllers\PanelController::class,'Tutorials'])->name('tutorials');

    Route::get('transactions',[\App\Http\Controllers\PanelController::class,'Transactions'])->name('TransactionsList');

    Route::get('zarrin/paying', 'TransactionController@ZarrinPalPaying')->name('RemoteZarrinPalPaying');

    Route::get('zarrin/callback', 'TransactionController@ZarrinCallback')->name('RemoteZarrinCallback');

    Route::get('paystar/paying', 'TransactionController@PaystarPaying')->name('RemotePaystarPaying');

    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
});


//Route::get('status',['as'=>'minerStatus','uses'=>'Remote\RemoteController@minerStatus']);
//
//Route::get('subscription','Remote\SubscriptionController@index')->name('remoteSubscription');
//
//
//
//Route::group(['prefix'=>'hardware'],function(){
//
//    Route::post('zarrin/paying', 'Remote\RemoteOrderController@ZarrinPalPaying')->name('RemoteOrderZarrinPalPaying');
//
//    Route::get('zarrin/callback', 'Remote\RemoteOrderController@ZarrinCallback')->name('RemoteOrderZarrinCallback');
//
//    Route::post('paystar/paying', 'Remote\RemoteOrderController@PaystarPaying')->name('RemoteOrderPaystarPaying');
//});
//


//Route::post('register-pool','Remote\RemoteController@PoolRegister')->name('PoolRegister');
//
//Route::get('payment/success/{transid}',['as'=>'RemotePaymentSuccess','uses'=>'Remote\TransactionController@successPayment']);
//
//Route::get('payment/canceled/{transid}',['as'=>'RemotePaymentCanceled','uses'=>'Remote\TransactionController@FailedPayment']);
//
//Route::get('hardware','Remote\RemoteController@hardware')->name('hardware');
//
//
//
//Route::post('register-farm','Remote\RemoteController@RegisterFarm')->name('RegisterFarm');
//
//Route::post('get-pool-data','Remote\RemoteController@getPoolData')->name('getPoolData');

