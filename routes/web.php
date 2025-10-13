<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use Illuminate\Support\Facades\Route;

// ============================================
// FRONTEND ROUTES (PUBLIC)
// ============================================

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('home');

// Contact Form - Submit
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ============================================
// AUTHENTICATION ROUTES (BREEZE)
// ============================================
require __DIR__.'/auth.php';

// ============================================
// USER DASHBOARD & PROFILE (BREEZE)
// ============================================
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard - redirect ke admin contacts
    Route::get('/dashboard', function () {
        return redirect()->route('admin.contacts.index');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================================
// ADMIN ROUTES (PROTECTED)
// ============================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('admin.contacts.index');
    })->name('dashboard');

    // Contact Management
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Contact Actions
    Route::post('/contacts/{id}/approve', [AdminContactController::class, 'approve'])->name('contacts.approve');
    Route::post('/contacts/{id}/reject', [AdminContactController::class, 'reject'])->name('contacts.reject');
    Route::post('/contacts/{id}/notes', [AdminContactController::class, 'updateNotes'])->name('contacts.notes');

    // Bulk Actions
    Route::post('/contacts/bulk-approve', [AdminContactController::class, 'bulkApprove'])->name('contacts.bulk-approve');
    Route::post('/contacts/bulk-reject', [AdminContactController::class, 'bulkReject'])->name('contacts.bulk-reject');
    Route::post('/contacts/bulk-delete', [AdminContactController::class, 'bulkDelete'])->name('contacts.bulk-delete');
});
