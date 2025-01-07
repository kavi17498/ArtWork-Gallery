<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/',[ImageController::class,'showArtWorks'], function () {
    return view('welcome');
})->name('image.show');

Route::get('/artworks',[ImageController::class,'showArtWorks'])->name('image.show');

Route::get('/contactus', function () {
    return view('layouts.contact');
})->name('contactus');

Route::get('/aboutus', function () {
    return view('layouts.about');
})->name('contactus');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/image/upload', [ImageController::class, 'create'])->name('image.upload');
    Route::post('/image/upload', [ImageController::class, 'store'])->name('image.store');
    Route::get('/profile/artworks', [ImageController::class, 'userArtworks'])->name('user.artworks');
    Route::delete('/artworks/{id}', [ImageController::class, 'destroy'])->name('artworks.destroy');
    Route::get('/artworks/{id}/edit', [ImageController::class, 'edit'])->name('artworks.edit');
    Route::put('/artworks/{id}', [ImageController::class, 'update'])->name('artworks.update');
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');

});

require __DIR__.'/auth.php';
