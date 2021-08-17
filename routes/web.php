<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Data User
Route::resource('users', UserController::class);

// Route Data Spp
Route::resource('spp', SppController::class);

// Route Data Kelas
Route::resource('kelas', KelasController::class);

// Route Data Kelas
Route::resource('siswa', SiswaController::class);

// Route Data Pembayaran
Route::resource('pembayaran', PembayaranController::class);
