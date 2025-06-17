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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Middleware\SetLocaleFromSession;
use App\Http\Controllers\Admin\ArtistAdminController;
use App\Http\Controllers\ArtistAlbumController;

Route::get('/', function () {
    return redirect()->route('artists.index');
});

Route::middleware(['setLocaleFromSession'])->group(function () {

    Route::get('/admin/artists/create', [ArtistAdminController::class, 'create'])->name('admin.artists.create');
    Route::post('/admin/artists', [ArtistAdminController::class, 'store'])->name('admin.artists.store');
    Route::get('/admin/artists', [ArtistAdminController::class, 'index'])->name('admin.artists.index');
    Route::delete('/admin/artists/{artist}', [ArtistAdminController::class, 'destroy'])->name('admin.artists.destroy');

    Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');

    Route::get('/albums/create', [AlbumController::class, 'create'])->middleware('auth')->name('albums.create');
    Route::post('/albums', [AlbumController::class, 'store'])->middleware('auth')->name('albums.store');
    
    Route::get('/my-albums', [ArtistAlbumController::class, 'index'])->middleware('auth')->name('artist.albums.index');
    Route::get('/my-albums/{album}/edit', [ArtistAlbumController::class, 'edit'])->middleware('auth')->name('artist.albums.edit');
    Route::put('/my-albums/{album}', [ArtistAlbumController::class, 'update'])->middleware('auth')->name('artist.albums.update');
    Route::delete('/my-albums/{album}', [ArtistAlbumController::class, 'destroy'])->middleware('auth')->name('artist.albums.destroy');

    Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');

    Route::post('/albums/{album}/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');
    Route::post('/albums/{album}/ratings', [RatingController::class, 'store'])->middleware('auth')->name('ratings.store');
    Route::put('/albums/{album}/ratings/{rating}', [RatingController::class, 'update'])->middleware('auth')->name('ratings.update');

    Route::get('/my-activity', [UserController::class, 'index'])->middleware('auth')->name('users.index');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/admin/reviews/{review}', [AdminController::class, 'destroyReview'])->name('admin.reviews.destroy');

    // auth
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->middleware('guest')->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
});

// locale
Route::get('/locale/{locale}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('locale.switch');
