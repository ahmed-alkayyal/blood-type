<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\CiteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\settingController;
use App\Http\Controllers\donationRequestController;
use App\Http\Controllers\front\mainController;
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
Route::group(['namespace'=>'front'],function(){
    Route::get('/', [App\Http\Controllers\front\mainController::class, 'home']);
});

Route::get('home',function(){
    return view('dashbord.home');
});
Route::resource('governorate',GovernorateController::class);
Route::resource('city',CiteController::class);
Route::resource('categorie',CategorieController::class);
Route::resource('posts',PostController::class);
Route::resource('setting',settingController::class);
Route::resource('donationrequest',donationRequestController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
