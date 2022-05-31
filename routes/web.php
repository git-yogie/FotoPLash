<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignInController;

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/postingan', [HomeController::class, 'postingan'])->name('postingan');
Route::get('/daftar', function () {
    return view('Auth.register');
})->name('register');

// Foto Routes
Route::get('/foto',[FotoController::class, 'show'])->name('fotoShow');
Route::get('/foto/create',[FotoController::class, 'create'])->name('fotoCreate');
Route::post('/foto/store',[FotoController::class, 'store'])->name('fotoStore');
Route::get('/foto/show/{id}',[FotoController::class, 'show'])->name('fotoShow');
Route::get('/foto/edit/{id}',[FotoController::class, 'edit'])->name('fotoEdit');
Route::get('/foto/delete/{id}',[FotoController::class, 'destroy'])->name('destroy');
Route::post('/foto/update/{id}',[FotoController::class, 'update'])->name('fotoUpdate');
Route::get('/foto/download/{foto}',[FotoController::class, 'download'])->name('download');

// Auth Routes
Route::post('/daftarProses',[SignInController::class,'signUp'])->name('registerProcess');
Route::post('/loginProses',[SignInController::class,'signIn'])->name('signIn');
Route::get('/signOut',[SignInController::class,'signOut'])->name('signOut');
