<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;







Route::group(['controller' =>AuthController::class , 'prefix'=> 'Admin'],function(){
    Route::get("login","getlogin")->name('login')->middleware('login.auth');
    Route::get('/Dashboard',"home")->middleware(["admin.auth","Lang"])->name('Dashboard');
    Route::Post("login","login")->name('logged');
    Route::get("logout","logout");
});


Route::group(['controller' =>RoleController::class , 'prefix'=> 'Admin/Role',"middleware" => ["admin.auth","Lang"]],function(){
Route::get('/','index');
Route::get('create','create');
Route::post('create','store');
Route::get('edit/{id}','edit');
Route::post('update/{id}','update');
Route::delete('delete/{id}','delete');
});

Route::group(['controller' =>AdminController::class , 'prefix'=> 'Admin',"middleware" => ["admin.auth","Lang"]],function(){
    Route::get('/','index');
    Route::get('create','create');
    Route::post('create','store');
    Route::get('edit/{id}','edit');
    Route::Put('update/{id}','update');
    Route::delete('delete/{id}','delete');
    Route::get('profile','profile');
    Route::Put('editImage/{id}','editImage');
    Route::Put('editprofile/{id}','editprofile');
    Route::get('Lang/{lang}','changeLange');
    Route::get("Notify","allNotification");
    });
    // ->middleware('can:admins2');

Route::group(['controller' =>UserController::class , 'prefix'=> 'Admin/users',"middleware" => ["admin.auth","Lang"]],function(){
    Route::get('/','index');
    Route::get('autocomplete','autocomplete');
    Route::get('update/Status/{user_id}/{status_code}','updateStatus')->name('Update_status');
    Route::get('details/{id}','moreDetails')->name('admin.user.details');
    Route::get('delete/{user_id}','delete');
    Route::get('notify','notify')->name('home');
    Route::post('/save-token','saveToken')->name('save-token');
    Route::post('/send-notification', 'sendNotification')->name('send.notification');
    });

