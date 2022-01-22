<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\HomeController;
use App\Http\Controllers\API\V1\ShowController;
use App\Http\Controllers\API\V1\VideoController;
use App\Http\Controllers\API\V1\ProdCastController;
use App\Http\Controllers\API\V1\PresenterController;
use App\Http\Controllers\API\V1\MusicBasketController;



Route::group(['prefix' => 'v1'], function () {


    Route::post('login', [HomeController::class, 'login']);
    Route::get('home', [HomeController::class, 'home']);
    Route::apiResource('videos', VideoController::class)->only('index');
    Route::apiResource('presenters', PresenterController::class)->only('index');
    Route::apiResource('shows', ShowController::class)->only('index'); // Show
    Route::apiResource('podcasts', ProdCastController::class)->only('index'); // ProdCast
    Route::get('categories', [MusicBasketController::class,'getCategory']);
    Route::apiResource('music-basket', MusicBasketController::class)->only('index'); // ProdCast
  
});
