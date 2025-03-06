<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NavbarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/navbar', [NavbarController::class, 'index'])->name('navbar');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/categories', [PostController::class, 'show_categories'])->name('categories');


Route::middleware('auth')->group(function () {
    Route::post('/posts/{post}/comments', [PostController::class, 'comments'])->name('comments.store');
});


Route::get('/category/{category}', [PostController::class, 'showByCategory'])->name('category.posts');
