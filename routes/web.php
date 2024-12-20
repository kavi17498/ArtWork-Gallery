<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ImageController::class,'showArtWorks'], function () {
    return view('welcome');
})->name('image.show');

Route::get('/artworks',[ImageController::class,'showArtWorks'])->name('image.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/image/upload', [ImageController::class, 'create'])->name('image.upload');
    Route::post('/image/upload', [ImageController::class, 'store'])->name('image.store');
});

Route::get('/profile/artworks', [ImageController::class, 'userArtworks'])->name('user.artworks');

require __DIR__.'/auth.php';
