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



Auth::routes();

// Profile Routes
Route::middleware(['auth', 'web'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{slug}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{slug}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profile/new-upload', [PictureController::class, 'create'])->name('profile.upload.create');
    Route::post('/profile/new-upload', [PictureController::class, 'store'])->name('profile.upload.store');
});
