<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;

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
    Route::post('change-password','ChangePassword')->middleware('api.auth');
    Route::post('edit-profile','editProfile')->middleware('api.auth');
    Route::post('email-verify','EmailVerification')->middleware('api.auth');
    Route::post('email-verify-send','EmailVerificationSend')->middleware('api.auth');
});
