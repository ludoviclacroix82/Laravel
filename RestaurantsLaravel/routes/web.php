<?php

use App\Http\Controllers\RestaurantsController;
use Illuminate\Support\Facades\Route;

Route::prefix('restaurant')->group(function () {

    Route::get('/', [RestaurantsController::class,'index'])->name('restaurants.index');
    Route::get('/show/{post:id}',[RestaurantsController::class,'show']);

    Route::prefix('create')->group(function () {
        Route::get('/',[RestaurantsController::class,'create'])->name('restaurants.create'); // name defini un nom de route 
        Route::post('/',[RestaurantsController::class,'store'])->name('restaurants.store');
    });

    Route::prefix('edit')->group(function () {
        Route::get('/{post:id}',[RestaurantsController::class,'edit'])->name('restaurants.edit'); // name defini un nom de route 
        Route::patch('/{post:id}',[RestaurantsController::class,'update'])->name('restaurants.update');
    });
    
});

