<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','as' => 'admin.','middleware'=>'auth'], function () {
    Route::get('/',[App\Http\Controllers\Dashboard\HomeController::class,'index'])->name('admin');

    Route::resource('users', App\Http\Controllers\Dashboard\UserController::class);
    Route::resource('presenters', App\Http\Controllers\Dashboard\PresenterController::class);
    Route::resource('shows', App\Http\Controllers\Dashboard\ShowController::class);
    Route::resource('videos', App\Http\Controllers\Dashboard\VideoController::class);
    Route::get('app-settings', [App\Http\Controllers\Dashboard\HomeController::class,'appSetting'])->name('app-settings');
   
    Route::resource('notifications', App\Http\Controllers\Dashboard\NotificationController::class);
  
    Route::get('admin',function(){
        return 'admin';
    });



});
