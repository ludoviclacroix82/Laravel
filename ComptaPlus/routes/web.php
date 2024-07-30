<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientsController::class,'index']);
});

Route::prefix('admin')->group(function () {

    Route::get('/',);

    Route::prefix('/clients')->group(function () {
        Route::get('/add', [ClientsController::class,'create'])->name('admin.clients.create');
        Route::post('/add', [ClientsController::class,'store'])->name('admin.clients.store');
    });
});

