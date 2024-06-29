<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return 'welcome';
});

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::resource('dashboard', AdminController::class);


// Route::get('/create', [App\Http\Controllers\AdminController::class, 'store']);


Route::prefix('admin')->middleware(['auth', 'role'])->group(function () {
    Route::get('user', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('dashboard', AdminController::class);
});