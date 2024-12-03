<?php

use App\Http\Controllers\Auth\BlogController;
use App\Http\Controllers\Auth\CategoriesController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\TagController;
use App\Http\Controllers\Site\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public Routes
// These routes are accessible by everyone, regardless of authentication status
Route::get('/', [BlogController::class, 'index'])->name('home'); // Home page
Route::get('single-blog/{id}', [BlogController::class, 'openSingleBlog'])->name('single-blog'); // Single blog view

// Authentication Routes
// Standard authentication routes including login, registration, and password reset
Auth::routes();

// Routes for authenticated users
// These routes require the user to be authenticated
Route::middleware('auth')->group(function () {

    // Admin Routes - Only Admin users can access these routes
    // These routes are wrapped with 'isAdmin' middleware for role-based access control
    Route::middleware('isAdmin')->group(function () {
        Route::get('auth/dashboard', [DashboardController::class, 'dashboard'])
            ->name('auth.dashboard'); // Admin dashboard
        // Other admin-specific routes can be added here
    });

    // User Routes - Only regular Users can access these routes
    // These routes are wrapped with 'isUser' middleware for role-based access control
    Route::middleware('isUser')->group(function () {
        Route::get('user/dashboard', [DashboardController::class, 'userDashboard'])
            ->name('user.dashboard'); // User-specific dashboard
        // Other user-specific routes can be added here
    });

    // General Dashboard - Accessible by all authenticated users
    // This is the common dashboard that can be accessed by both Admin and User
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Posts Routes - These routes allow users to manage posts (accessible by both admins and users)
    Route::resource('auth/posts', PostController::class); // CRUD operations for posts

    // Categories Routes - Only accessible by authenticated users
    Route::get('auth/categories', [CategoriesController::class, 'OpenCategoriesPage'])->name('auth.categories');
    Route::get('auth/tags', [TagController::class, 'OpenTagPage'])->name('auth.tags');

    // Profile Routes - Manage user profile (accessible by both admins and users)
    Route::get('auth/profile', [ProfileController::class, 'openProfilePage'])->name('auth.profile.index');
    Route::post('auth/profile', [ProfileController::class, 'storeProfile'])->name('auth.profile.store');

    // Commenting Routes - Allow users to comment on posts and replies
    Route::post('post/comment/{postId}', [CommentController::class, 'postComment'])->name('post.comment');
    Route::post('comment/reply/{commentId}', [CommentController::class, 'postCommentReply'])->name('comment.reply');
    Route::delete('comment/reply/delete', [CommentController::class, 'deleteCommentReply'])->name('comment.reply.delete');
});
