<?php

use App\Http\Controllers\Auth\BlogController;
use App\Http\Controllers\Auth\CategoriesController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/home');
})->name('logout');

// Authentication Routes
Auth::routes([
    // 'register' => false,
]);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('auth/dashboard', [DashboardController::class, 'dashboard'])->name('auth.dashboard')->middleware('isAdmin');
    Route::get('user/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('auth/posts', PostController::class);

    Route::get('auth/categories', [CategoriesController::class, 'OpenCategoriesPage'])->name('auth.categories');
    Route::get('auth/tags', [TagController::class, 'OpenTagPage'])->name('auth.tags');
    Route::get('auth/profile', [ProfileController::class, 'openProfilePage'])->name('auth.profile.index');
    Route::post('auth/profile', [ProfileController::class, 'storeProfile'])->name('auth.profile.store');
});

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('single-blog/{id}', [BlogController::class, 'openSingleBlog'])->name('single-blog');

Route::middleware('auth')->group(function () {
    Route::post('post/comment/{postId}', [CommentController::class, 'postComment'])->name('post.comment');
    Route::post('comment/reply/{commentId}', [CommentController::class, 'postCommentReply'])->name('comment.reply');
    Route::delete('comment/reply/delete', [CommentController::class, 'deleteCommentReply'])->name('comment.reply.delete');
});
