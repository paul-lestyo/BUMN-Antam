<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pegawai;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/article', [HomeController::class, 'article'])->name('article');
Route::get('/article/{id}', [HomeController::class, 'detailArticle'])->name('article.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::group(['as' => 'pegawai.', 'prefix' => 'pegawai', 'middleware' => 'auth'], function () {
	Route::get('dashboard', [Pegawai\DashboardController::class, 'index'])->name('dashboard');
	Route::resource('inbox', 'App\Http\Controllers\Pegawai\InboxController');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
	Route::resource('divisi', 'App\Http\Controllers\Admin\DivisiController');
});
