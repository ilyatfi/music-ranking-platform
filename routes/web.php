<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('artists.index');
});

Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::post('/albums/{album}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/albums/{album}/ratings', [RatingController::class, 'store'])->name('ratings.store');

Route::get('/profile', [UserController::class, 'index'])->middleware('auth')->name('users.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::delete('/admin/reviews/{review}', [AdminController::class, 'destroyReview'])->name('admin.reviews.destroy');

// auth
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');