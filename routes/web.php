<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('web');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts', [PostController::class, 'index'])
					->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('checkAuthorStatus')
                    ->name('posts.create');

Route::middleware(['web'])->group(function () {

    Route::post('/posts', [PostController::class, 'store'])
                        ->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])
                        ->name('posts.show');

});



Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
					->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])
					->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
					->name('posts.destroy');

Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

require __DIR__.'/auth.php';
