<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','as' => 'admin.','middleware'=>'auth'], function () {
    Route::get('/',[App\Http\Controllers\Dashboard\HomeController::class,'index'])->name('admin');

    Route::resource('users', App\Http\Controllers\Dashboard\UserController::class);
  
    Route::resource('notifications', App\Http\Controllers\Dashboard\NotificationController::class);
  
    Route::get('admin',function(){
        return 'admin';
    });



});
