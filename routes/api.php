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
    Route::get('citys',[MainController::class,'citys']);
    Route::get('governorates',[MainController::class,'governorates']);
    Route::get('bloodTypes',[MainController::class,'bloodTypes']);
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::group(['middleware'=>'auth:api'],function(){
        Route::get('category',[MainController::class,'category']);
        Route::get('posts',[MainController::class,'posts']);
    });
});
// pass 012454545545
