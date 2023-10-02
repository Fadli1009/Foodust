<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/logins', [AuthController::class, 'login'])->name('loginfunc');

    Route::get('/registrasi', [AuthController::class, 'register']);
    Route::post('/regis', [AuthController::class, 'regis']);

    Route::get('/', [AuthController::class, 'menu']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/index', [AdminController::class, 'index']);
    Route::get('/user', [AdminController::class, 'user']);
    Route::post('/user/barang/{id}', [KeranjangController::class, 'index']);
    Route::resource('barang', BarangController::class);
    Route::resource('kategori', KategoriController::class);
});