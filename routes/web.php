<?php

use App\Http\Controllers\PictureController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');


// Download Image
Route::get('/download/{slug}', [PictureController::class, 'download'])->name('download');
Route::get('/getPictureById/{id}', [PictureController::class, 'getPictureById']);


Auth::routes();

// Profile Routes
Route::middleware(['auth', 'web'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{slug}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{slug}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/getPictureById/{id}', [ProfileController::class, 'getPictureById']);

    Route::get('/profile/{slug}/new-upload', [PictureController::class, 'create'])->name('profile.upload.create');
    Route::post('/profile/{slug}/new-upload', [PictureController::class, 'store'])->name('profile.upload.store');
    Route::get('/profile/{slug}/uploads', [PictureController::class, 'uploads'])->name('profile.uploads');
    // Route::get('/profile/{user_slug}/uploads/{picture_slug}', [PictureController::class, 'uploadShow'])->name('profile.uploads.show');
    Route::get('/profile/{user_slug}/uploads/{picture_slug}/edit', [PictureController::class, 'edit'])->name('profile.uploads.edit');
    Route::put('/profile/{user_slug}/uploads/{picture_slug}/update', [PictureController::class, 'update'])->name('profile.uploads.update');
});
