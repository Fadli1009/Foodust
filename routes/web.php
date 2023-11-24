<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/logins', [AuthController::class, 'login'])->name('loginfunc');

    Route::get('/registrasi', [AuthController::class, 'register']);
    Route::post('/regis', [AuthController::class, 'regis']);

    Route::get('/', [AuthController::class, 'menu']);
    Route::get('/forgotpassword',[AdminController::class,'forgotpassword'])->name('password.request');
    Route::post('/forgotpassword',[AdminController::class,'funcforgotpassword'])->name('password.email');
    Route::get('/reset-password/{token}', function ($token) {
        return view('reset-password', ['token' => $token]);    
    })->middleware('guest')->name('password.reset');
    Route::post('/reset-password',[AdminController::class,'resetPassword'])->name('password.update');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/index', [AdminController::class, 'index']);
    Route::get('/user', [KeranjangController::class, 'showFood']);
    Route::get('/user/profile',[AdminController::class,'profile']);
    Route::put('/user/profile/upload',[AdminController::class,'createprofile']);
    Route::get('/user/keranjang/{id}', [KeranjangController::class, 'show'])->name('cart.show');
    Route::post('/user/keranjang/masuk', [KeranjangController::class, 'create']);
    Route::resource('barang', BarangController::class);
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/keranjang/checkout', [KeranjangController::class, 'checkout']);
    Route::post('/keranjang/checkout/verify', [KeranjangController::class, 'verifyUser']);
    Route::get('/keranjang/checkout/print', [KeranjangController::class, 'printpdf']);
    Route::get('/keranjang/checkout/thanks', [KeranjangController::class, 'thanks']);
    Route::get('/keranjang/{id}', [KeranjangController::class, 'destroy']);
    Route::resource('kategori', KategoriController::class);
    Route::get('/report', [AdminController::class, 'report']);
    Route::get('/carimenu',[AdminController::class,'cari']);
    Route::get('/filter',[AdminController::class,'filter'])->name('filter.report');
});