<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\HomeController;
use App\Http\Controllers\API\V1\VideoController;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\PresenterController;



Route::group(['prefix' => 'v1'], function () {

    Route::post('login', [AuthController::class, 'login']);


    Route::get('home', [HomeController::class, 'home']);
    Route::apiResource('videos', VideoController::class)->only('index');
    Route::apiResource('presenters', PresenterController::class)->only('index');
  
});
