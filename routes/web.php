<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Models\Invoice;
use App\Models\User;

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

Route::get('/', function () {
    return redirect('Admin/Dashboard');
});

Route::controller(AuthController::class)->prefix('auth')->group(function (){
    Route::get("ResetPassword/{token}","reset_password")->name("ResetPassword"); // show form to write password and confirmpassword
    Route::post("ConfirmPassword","confirm_password")->name("ConfirmPassword"); // update password
});

