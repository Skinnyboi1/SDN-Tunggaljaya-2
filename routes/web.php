<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OperatorController;
use App\Http\Middleware\RoleMiddleware;

// 1. Guest / Public Routes
Route::get('/', [GuestProfileController::class, 'index'])->name('home');
Route::get('/berita/{slug}', [GuestProfileController::class, 'newsDetail'])->name('news.detail');

// 2. Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Protected Operator Routes
Route::middleware(['auth', RoleMiddleware::class . ':operator'])->prefix('operator')->name('operator.')->group(function () {
    Route::get('/dashboard', [OperatorController::class, 'dashboard'])->name('dashboard');
    
    // Profile Management
    Route::get('/profile', [OperatorController::class, 'profile'])->name('profile');
    Route::post('/profile', [OperatorController::class, 'updateProfile'])->name('profile.update');

    // Teachers Management
    Route::get('/teachers', [OperatorController::class, 'teachers'])->name('teachers');
    Route::post('/teachers', [OperatorController::class, 'storeTeacher'])->name('teachers.store');
    Route::put('/teachers/{teacher}', [OperatorController::class, 'updateTeacher'])->name('teachers.update');
    Route::delete('/teachers/{teacher}', [OperatorController::class, 'deleteTeacher'])->name('teachers.delete');

    // Facilities Management
    Route::get('/facilities', [OperatorController::class, 'facilities'])->name('facilities');
    Route::post('/facilities', [OperatorController::class, 'storeFacility'])->name('facilities.store');
    Route::put('/facilities/{facility}', [OperatorController::class, 'updateFacility'])->name('facilities.update');
    Route::delete('/facilities/{facility}', [OperatorController::class, 'deleteFacility'])->name('facilities.delete');

    // News/Posts Management
    Route::get('/posts', [OperatorController::class, 'posts'])->name('posts');
    Route::post('/posts', [OperatorController::class, 'storePost'])->name('posts.store');
    Route::put('/posts/{post}', [OperatorController::class, 'updatePost'])->name('posts.update');
    Route::delete('/posts/{post}', [OperatorController::class, 'deletePost'])->name('posts.delete');

    // Gallery Management
    Route::get('/gallery', [OperatorController::class, 'gallery'])->name('gallery');
    Route::post('/gallery', [OperatorController::class, 'storeGallery'])->name('gallery.store');
    Route::delete('/gallery/{gallery}', [OperatorController::class, 'deleteGallery'])->name('gallery.delete');

    // Static Site Export
    Route::post('/export-static', [OperatorController::class, 'exportStatic'])->name('exportStatic');
    Route::get('/download-static-zip', [OperatorController::class, 'downloadStaticZip'])->name('downloadStaticZip');
});
