<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\InvoiceController;
use App\Http\Controllers\api\OutLookController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['controller' =>AuthController::class , 'prefix'=> 'Auth'],function(){
    Route::post('login','login');
    Route::post('register','register');
    Route::post('foregt-password','ForgetPasswordUser');
    Route::post('change-password','ChangePassword')->middleware(['api.auth','user.status']);
    Route::post('edit-profile','editProfile')->middleware(['api.auth','user.status']);
    Route::post('show-profile','showProfile')->middleware(['api.auth','user.status']);
    Route::post('home','home')->middleware(['api.auth','user.status']);
    Route::post('email-verify','EmailVerification')->middleware(['user.status']);
    Route::post('email-verify-send','EmailVerificationSend')->middleware(['user.status']);
});

Route::group(['controller' =>InvoiceController::class , 'prefix'=> 'invoice','middleware' => ['api.auth','user.status'] ],function(){
    Route::post('create','create');
    Route::get('due','due');
    Route::get('paid','paid');
    Route::get('pdf','pdf');
    Route::post('details','details');
});

Route::group(['controller' =>OutLookController::class , 'prefix'=> 'OutLook' , 'middleware' => ['api.auth','user.status']],function(){
    Route::post('create','create');
    Route::Post('checkCode','checkCode');

});

