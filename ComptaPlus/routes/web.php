<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Models\Inbox;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::prefix('login')->middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/', [AuthController::class, 'loginCheck']);
});

Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientsController::class, 'index'])->name('clients');
    Route::get('/show/{clients:id}', [ClientsController::class, 'show'])->name('client.show');
});

Route::prefix('invoices')->group(function () {
    Route::get('/', [InvoicesController::class, 'index'])->name('invoices');
    Route::get('/show/{invoices:id}', [InvoicesController::class, 'show'])->name('invoice.show');
    Route::get('/client/{clients:id}', [InvoicesController::class, 'invoicesClient'])->name('invoice.client');
});

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/',[AdminController::class,'index'])->name('admin.home');

    Route::prefix('/clients')->group(function () {

        Route::get('/', [AdminController::class, 'clientsHome'])->name('admin.clients.home');

        Route::get('/add', [ClientsController::class, 'create'])->name('admin.clients.create');
        Route::post('/add', [ClientsController::class, 'store'])->name('admin.clients.store');

        Route::get('/edit/{clients:id}', [ClientsController::class, 'edit'])->name('admin.clients.edit');
        Route::patch('/edit/{clients:id}', [ClientsController::class, 'update'])->name('admin.clients.update');

        Route::get('/delete/{clients:id}', [ClientsController::class, 'delete'])->name('admin.clients.delete');
        Route::delete('/delete/{clients:id}', [ClientsController::class, 'destroy']);
    });

    Route::prefix('/invoices')->group(function () {

        Route::get('/', [AdminController::class, 'invoicesHome'])->name('admin.invoices.home');

        Route::get('/add', [InvoicesController::class, 'create'])->name('admin.invoices.create');
        Route::post('/add', [InvoicesController::class, 'store'])->name('admin.invoices.store');

        Route::get('/edit/{invoices:id}', [InvoicesController::class, 'edit'])->name('admin.invoices.edit');
        Route::patch('/edit/{invoices:id}', [InvoicesController::class, 'update'])->name('admin.invoices.update');

        Route::get('/delete/{invoices:id}', [InvoicesController::class, 'delete'])->name('admin.invoices.delete');
        Route::delete('/delete/{invoices:id}', [InvoicesController::class, 'destroy']);

        Route::get('/unclosed/{invoices:id}', [InvoicesController::class, 'getunclosed'])->name('admin.invoices.unclosed');
        route::post('/unclosed/{invoices:id}', [InvoicesController::class, 'toConcluded']);
    });

    Route::prefix('/users')->group(function () {
        
        Route::get('/',[UserController::class,'index'])->name('admin.users.home');
        Route::get('/show/{user:id}',[UserController::class,'show'])->name('admin.users.show');

        Route::get('/add', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/add', [UserController::class, 'store'])->name('admin.users.store');

        Route::get('/edit/{user:id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::patch('/edit/{user:id}', [UserController::class, 'update'])->name('admin.users.update');

        Route::get('/delete/{user:id}', [UserController::class, 'delete'])->name('admin.users.delete');
        Route::delete('/delete/{user:id}', [UserController::class, 'destroy']);

    });

    Route::prefix('/inbox')->group(function () {
        Route::get('/',[InboxController::class,'index'])->name('admin.inbox.home');
    });

});
Route::prefix('profil')->middleware('auth')->group(function () {

    Route::get('/',[ProfilController::class,'index'])->name('profil.home');

    Route::get('/edit/{user:id}', [UserController::class, 'edit'])->name('profil.edit');
    Route::patch('/edit/{user:id}', [UserController::class, 'update'])->name('profil.update');
});