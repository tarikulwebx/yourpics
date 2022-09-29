<?php

use App\Http\Controllers\AuthorPictureController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
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

Auth::routes();
// Profile Routes
Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{slug}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{slug}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/getPictureById/{id}', [ProfileController::class, 'getPictureById']);

    Route::get('/profile/{slug}/new-upload', [PictureController::class, 'create'])->name('profile.upload.create');
    Route::post('/profile/{slug}/new-upload', [PictureController::class, 'store'])->name('profile.upload.store');
    Route::get('/profile/{slug}/uploads', [PictureController::class, 'uploads'])->name('profile.uploads');
    // Route::get('/profile/{user_slug}/uploads/{picture_slug}', [PictureController::class, 'uploadShow'])->name('profile.uploads.show');
    Route::get('/profile/{user_slug}/uploads/{picture_slug}/edit', [PictureController::class, 'edit'])->name('profile.uploads.edit');
    Route::put('/profile/{user_slug}/uploads/{picture_slug}/update', [PictureController::class, 'update'])->name('profile.uploads.update');
    Route::delete('/profile/deletePictureById/{id}', [PictureController::class, 'deletePictureById'])->name('profile.uploads.delete');
});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'loadMorePicture'])->name('load-picture');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/gallery/{slug}', [PictureController::class, 'singlePicture'])->name('singlePicture');

// Pictures by Tag
Route::get('/tag/{slug}', [PictureController::class, 'picturesByTag'])->name('picturesByTag');

// Author Picture
Route::get('/author/{slug}', [AuthorPictureController::class, 'index'])->name('author.index');

// Download Image
Route::get('/download/{slug}', [PictureController::class, 'download'])->name('download');
Route::get('/getPictureById/{id}', [PictureController::class, 'getPictureById']);

// Add to Favorite
Route::post('/addToFavorite', [FavoriteController::class, 'addToFavorite']);







/**
 * Admin Routes
 */

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.dashboard');
