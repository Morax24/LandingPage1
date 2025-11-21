<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumReplyController;
use App\Http\Controllers\Admin\ForumReplyController as AdminForumReplyController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController; // TAMBAHKAN INI

// ============================================
// FRONTEND ROUTES (PUBLIC)
// ============================================

// Landing Page - PAKAI CONTROLLER
Route::get('/', [LandingController::class, 'index'])->name('home');

// Contact Form - Submit
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Forum Reply Routes (Public)
Route::post('/forum/reply', [ForumReplyController::class, 'store'])->name('forum.reply.store');
Route::get('/forum/{contactId}/replies', [ForumReplyController::class, 'getReplies'])->name('forum.replies.get');

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

    // Dashboard - TAMBAHKAN ROUTE INI UNTUK DASHBOARD STATISTIK
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dashboard redirect (tetap pertahankan yang sudah ada)
    Route::get('/dashboard-redirect', function () {
        return redirect()->route('admin.contacts.index');
    })->name('dashboard.redirect');

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

    // Media Management
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::get('/media/{id}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('/media/{id}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
    Route::post('/media/bulk-delete', [MediaController::class, 'bulkDelete'])->name('media.bulk-delete');
    Route::post('/media/{id}/toggle-active', [MediaController::class, 'toggleActive'])->name('media.toggle-active');

    // Forum Replies Management
    Route::get('/forum-replies', [AdminForumReplyController::class, 'index'])->name('forum-replies.index');
    Route::post('/forum-replies/{id}/approve', [AdminForumReplyController::class, 'approve'])->name('forum-replies.approve');
    Route::post('/forum-replies/{id}/reject', [AdminForumReplyController::class, 'reject'])->name('forum-replies.reject');
    Route::delete('/forum-replies/{id}', [AdminForumReplyController::class, 'destroy'])->name('forum-replies.destroy');
    Route::post('/forum-replies/bulk-approve', [AdminForumReplyController::class, 'bulkApprove'])->name('forum-replies.bulk-approve');
    Route::post('/forum-replies/bulk-delete', [AdminForumReplyController::class, 'bulkDelete'])->name('forum-replies.bulk-delete');
});
