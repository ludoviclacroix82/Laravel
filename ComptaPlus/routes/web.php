<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientsController::class,'index'])->name('clients');
    Route::get('/show/{clients:id}',[ClientsController::class,'show']);
});

Route::prefix('invoices')->group(function () {
    Route::get('/', [InvoicesController::class,'index'])->name('invoices');
    Route::get('/show/{invoices:id}',[InvoicesController::class,'show']);
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

    Route::prefix('/invoices')->group(function () {
        Route::get('/add', [InvoicesController::class,'create'])->name('admin.invoices.create');
        Route::post('/add', [InvoicesController::class,'store'])->name('admin.invoices.store');
        
        Route::get('/edit/{invoices:id}', [InvoicesController::class,'edit'])->name('admin.invoices.edit');
        Route::patch('/edit/{invoices:id}', [InvoicesController::class,'update'])->name('admin.invoices.update');

        Route::get('/delete/{invoices:id}', [InvoicesController::class,'delete']);
        Route::delete('/delete/{invoices:id}', [InvoicesController::class,'destroy']);
    });
});

