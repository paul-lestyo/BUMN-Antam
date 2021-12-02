<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pegawai;
use App\Models\Role;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/article', [HomeController::class, 'article'])->name('article');
Route::get('/article/{id}', [HomeController::class, 'detailArticle'])->name('article.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::group(['as' => 'pegawai.', 'prefix' => 'pegawai', 'middleware' => 'role:pegawai'], function () {
	Route::get('dashboard', [Pegawai\DashboardController::class, 'index'])->name('dashboard');
	Route::resource('inbox', 'App\Http\Controllers\Pegawai\InboxController');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'role:admin'], function () {
	Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
	Route::resource('divisi', Admin\DivisiController::class);
	Route::get('pengajuan-cuti', [Admin\PengajuanCutiController::class, 'index'])->name('pengajuan-cuti');

	Route::get('pegawai', [Admin\PegawaiController::class, 'index'])->name('pegawai');
	Route::get('pegawai/{id}', [Admin\PegawaiController::class, 'edit'])->name('pegawai.edit');
	Route::post('pegawai/update/{id}', [Admin\PegawaiController::class, 'update'])->name('pegawai.update');
	Route::delete('pegawai/destroy/{id}', [Admin\PegawaiController::class, 'destroy'])->name('pegawai.destroy');
});
