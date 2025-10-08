<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Landing page dengan reviews
Route::get('/', [ReviewController::class, 'index'])->name('home');

// Google OAuth routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::post('logout', [GoogleController::class, 'logout'])->name('logout');

// Review routes
Route::middleware('auth')->group(function () {
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('reviews', [ReviewController::class, 'admin'])->name('admin.reviews');
    Route::post('reviews/{id}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');
    Route::delete('reviews/{id}', [ReviewController::class, 'delete'])->name('reviews.delete');
});
