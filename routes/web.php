<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MahasiswaController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

// Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/nama/{param1?}', function ($param1='') {
    return 'Nama saya: '.$param1;
});
Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});
Route::get('/nama/{param1?}/{nim?}', function ($param1='',$nim='') {
    return 'Nama saya: '.$param1. '<br>Nim :'.$nim;
});

Route::get('/about', function () {
    return view('halaman-about');
});

//Route::get('/home',[HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::resource('warga', WargaController::class);

Route::resource('users', UsersController::class);

Route::resource('pelanggan', PelangganController::class);

Route::resource('products', ProductController::class);


