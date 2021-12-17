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

	Route::get('pengajuan-cuti', [Pegawai\PengajuanCutiController::class, 'index'])->name('pengajuan-cuti.index');
	Route::get('pengajuan-cuti/create', [Pegawai\PengajuanCutiController::class, 'create'])->name('pengajuan-cuti.create');
	Route::post('pengajuan-cuti/create', [Pegawai\PengajuanCutiController::class, 'store'])->name('pengajuan-cuti.store');

	Route::group(['as' => 'presensi.', 'prefix' => 'presensi'], function() {
		Route::get('/', [Pegawai\PresensiController::class, 'index'])->name('index');
		Route::get('/prosesAbsen', [Pegawai\PresensiController::class, 'store'])->name('prosesAbsen');
		Route::get('/isiJurnal', [Pegawai\PresensiController::class, 'edit'])->name('isiJurnal');
		Route::post('/isiJurnal', [Pegawai\PresensiController::class, 'update'])->name('isiJurnal.post');
	});
	
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'role:admin'], function () {
	Route::get('about', [Admin\Page\AboutController::class, 'index'])->name('about.index');
	Route::post('about', [Admin\Page\AboutController::class, 'update'])->name('about.update');

	Route::get('contact', [Admin\Page\ContactController::class, 'index'])->name('contact.index');
	Route::post('contact', [Admin\Page\ContactController::class, 'update'])->name('contact.update');

	Route::group(['as' => 'article.', 'prefix' => 'article'], function () {
		Route::get('/', [Admin\Page\ArticleController::class, 'index'])->name('index');
		Route::get('/create', [Admin\Page\ArticleController::class, 'create'])->name('create');
		Route::post('/create', [Admin\Page\ArticleController::class, 'store'])->name('store');
		Route::get('/{id}', [Admin\Page\ArticleController::class, 'edit'])->name('edit');
		Route::post('/update/{id}', [Admin\Page\ArticleController::class, 'update'])->name('update');
		Route::delete('/destroy/{id}', [Admin\Page\ArticleController::class, 'destroy'])->name('destroy');
	});

	Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');


	Route::resource('divisi', Admin\DivisiController::class);

	Route::group(['as' => 'pengajuan-cuti.', 'prefix' => 'pengajuan-cuti'], function () {
		Route::get('/', [Admin\PengajuanCutiController::class, 'index'])->name('index');
		Route::get('/create', [Admin\PengajuanCutiController::class, 'create'])->name('create');
		Route::post('/create', [Admin\PengajuanCutiController::class, 'store'])->name('store');
		Route::get('/{id}', [Admin\PengajuanCutiController::class, 'edit'])->name('edit');
		Route::post('/update/{id}', [Admin\PengajuanCutiController::class, 'update'])->name('update');
		Route::delete('/destroy/{id}', [Admin\PengajuanCutiController::class, 'destroy'])->name('destroy');
	});

	Route::group(['as' => 'pegawai.', 'prefix' => 'pegawai'], function () {
		Route::get('/', [Admin\PegawaiController::class, 'index'])->name('index');
		Route::get('/create', [Admin\PegawaiController::class, 'create'])->name('create');
		Route::post('/create', [Admin\PegawaiController::class, 'store'])->name('store');
		Route::get('/{id}', [Admin\PegawaiController::class, 'edit'])->name('edit');
		Route::post('/update/{id}', [Admin\PegawaiController::class, 'update'])->name('update');
		Route::delete('/destroy/{id}', [Admin\PegawaiController::class, 'destroy'])->name('destroy');
	});

	Route::group(['as' => 'inbox.', 'prefix' => 'inbox'], function () {
		Route::get('/', [Admin\InboxController::class, 'index'])->name('index');
		Route::get('/reply/{id}', [Admin\InboxController::class, 'create'])->name('reply');
		Route::post('/reply/{id}', [Admin\InboxController::class, 'store'])->name('store');
		Route::get('/{id}', [Admin\InboxController::class, 'show'])->name('show');
	});
});
