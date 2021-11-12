<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pegawai;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index']);


Route::group(['as' => 'pegawai.', 'prefix' => '/pegawai', 'middleware' => 'auth'], function () {
	Route::get('/dashboard', [Pegawai\DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => 'auth'], function () {
	Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
});
