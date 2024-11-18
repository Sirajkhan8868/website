<?php

use App\Http\Controllers\Auth\BlogController;
use App\Http\Controllers\Auth\CategoriesController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\EditorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Logout Route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Auth::routes([
    // 'register' => false,
]);


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::resource('posts', PostController::class);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('auth/categories', [CategoriesController::class, 'OpenCategoriesPage'])->name('auth.categories');



Route::get('/',[BlogController::class,'index'])->name('home');
Route::get('/single-blog',[BlogController::class,'openSingleBlog'])->name('home');


