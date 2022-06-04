<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SignInController;

Route::get('/',[HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/postingan', [HomeController::class, 'postingan'])->name('postingan');
Route::get('/daftar', function () {
    return view('Auth.register');
})->name('register');

// Foto Routes
// Route::get('/foto',[FotoController::class, 'show'])->name('fotoShow');
Route::get('/foto/create',[FotoController::class, 'create'])->name('fotoCreate')->middleware('auth');
Route::post('/foto/store',[FotoController::class, 'store'])->name('fotoStore')->middleware('auth');
Route::get('/foto/show/{id}',[FotoController::class, 'show'])->name('fotoShow');
Route::get('/foto/edit/{id}',[FotoController::class, 'edit'])->name('fotoEdit');
Route::get('/foto/delete/{id}',[FotoController::class, 'destroy'])->name('destroy')->middleware('auth');
Route::post('/foto/update/{id}',[FotoController::class, 'update'])->name('fotoUpdate')->middleware('auth');
Route::get('/foto/download/{foto}',[FotoController::class, 'download'])->name('download');

// like foto route.
Route::get('/foto/like/{id}',[LikeController::class, 'Like'])->name('Like')->middleware('auth');
Route::get('/foto/dislike/{id}',[LikeController::class, 'DisLike'])->name('DisLike')->middleware('auth');
Route::get('/foto/disukai',[LikeController::class, 'UserLikeList'])->name('UserLikeList')->middleware('auth');



// Auth Routes
Route::post('/daftarProses',[SignInController::class,'signUp'])->name('registerProcess');
Route::post('/loginProses',[SignInController::class,'signIn'])->name('signIn');
Route::get('/signOut',[SignInController::class,'signOut'])->name('signOut')->middleware('auth');
Route::get('/profile',[SignInController::class,'profile'])->name('profile')->middleware('auth');
Route::get('/profile/setting',[SignInController::class,'setting'])->name('setting')->middleware('auth');
Route::post('/profile/picture/upload',[SignInController::class,'uploadPicture'])->name('userpicture')->middleware('auth');
Route::post('/profile/Bio/update',[SignInController::class,'BioUpdate'])->name('bio_update')->middleware('auth');
Route::post('/profile/update',[SignInController::class,'UpdateUser'])->name('profile.update')->middleware('auth');
Route::post('/profile/password/update',[SignInController::class,'UpdatePassword'])->name('password.update')->middleware('auth');
