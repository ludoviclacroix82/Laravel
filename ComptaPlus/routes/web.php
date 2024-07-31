<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientsController::class,'index'])->name('clients');
});

Route::prefix('admin')->group(function () {

    Route::get('/',);

    Route::prefix('/clients')->group(function () {
        Route::get('/add', [ClientsController::class,'create'])->name('admin.clients.create');
        Route::post('/add', [ClientsController::class,'store'])->name('admin.clients.store');
        
        Route::get('/edit/{clients:id}', [ClientsController::class,'edit'])->name('admin.clients.edit');
        Route::patch('/edit/{clients:id}', [ClientsController::class,'update'])->name('admin.clients.update');

        Route::get('/delete/{clients:id}', [ClientsController::class,'delete']);
        Route::delete('/delete/{clients:id}', [ClientsController::class,'destroy']);
    
    });
});

