<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {

    Route::resource('/posts', PostController::class);
    Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/technologies', TechnologyController::class)->except('show','edit');
    Route::resource('/tags', TagController::class)->except('show','edit');
});

Route::middleware(['auth', 'role:editor|admin'])->group(function () {
    Route::get('/posts/drafts', [PostController::class, 'drafts'])->name('posts.drafts');
});

// routes/web.php
Route::middleware(['auth', 'role:editor|admin'])->group(function () {
    Route::post('/posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
});


require __DIR__.'/auth.php';
