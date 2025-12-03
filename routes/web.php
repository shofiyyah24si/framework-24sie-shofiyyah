<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

// Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/nama/{param1?}', function ($param1 = '') {
    return 'Nama saya: ' . $param1;
});
Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: ' . $param1;
});
Route::get('/nama/{param1?}/{nim?}', function ($param1 = '', $nim = '') {
    return 'Nama saya: ' . $param1 . '<br>Nim :' . $nim;
});

Route::get('/about', function () {
    return view('halaman-about');
});

//Route::get('/home',[HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('pelanggan', PelangganController::class);

Route::resource('warga', WargaController::class);

Route::resource('users', UsersController::class);

Route::resource('pelanggan', PelangganController::class);

Route::resource('products', ProductController::class);

Route::resource('login', AuthController::class);

//route login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Dashboard (setelah login)
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('checkislogin');

    Route::group(['middleware' => ['checkrole:Admin']], function () {
        // Route yang hanya dapat diakses oleh admin
        Route::resource('users', UsersController::class);
    });
