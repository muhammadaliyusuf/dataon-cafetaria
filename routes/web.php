<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('index');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk menampilkan halaman register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Route untuk proses register
Route::post('/register', [AuthController::class, 'register']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk menampilkan daftar menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

Route::post('/menu/order', [MenuController::class, 'order'])->name('menu.order');

Route::middleware(['auth'])->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('orders.order');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
});

