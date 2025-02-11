<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('index');
})->middleware('guest');

// Route untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login')->middleware('guest');
// Route untuk proses login
Route::post('/login', [AuthController::class, 'login']);
// Route untuk menampilkan halaman register
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register')->middleware('guest');
// Route untuk proses register
Route::post('/register', [AuthController::class, 'register']);
// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('menu', MenuController::class);
    Route::post('menu/order', [MenuController::class, 'order'])->name('menu.order');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('orders.order');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

