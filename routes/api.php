<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1','namespace'=>'Api'],function ()
{
    Route::get('cities',[MainController::class,'citys']);
    Route::get('governorates',[MainController::class,'governorates']);
    Route::get('bloodTypes',[MainController::class,'bloodTypes']);
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::group(['middleware'=>'auth:api'],function(){
        //start posts
        Route::get('category',[MainController::class,'category']);
        Route::get('posts',[MainController::class,'posts']);
        Route::get('post',[MainController::class,'post']);
        //end posts
        Route::get('settings',[MainController::class,'settings']);
        //start donations
        Route::Post('create_donations',[MainController::class,'createDonations']);
        Route::get('donations',[MainController::class,'donations']);
        Route::Post('donation_id',[MainController::class,'donationId']);
        //end donations
        // start Auth
        Route::get('showData',[AuthController::class,'showData']);
        Route::get('update_profile',[AuthController::class,'update_profile']);
        Route::Post('reset',[AuthController::class,'reset']);
        Route::Post('Password',[AuthController::class,'Password']);
        Route::Post('notification_setting',[AuthController::class,'notificationSetting']);
         // end Auth

    });
});
// pass 012454545545
