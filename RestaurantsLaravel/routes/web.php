<?php

use App\Http\Controllers\RestaurantsController;
use Illuminate\Support\Facades\Route;

Route::prefix('restaurant')->group(function () {

    Route::get('/', [RestaurantsController::class,'index']);
    Route::get('/show/{post:id}',[RestaurantsController::class,'show']);

});

