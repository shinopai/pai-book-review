<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

/* root */
Route::get('/', [BookController::class, 'index'])->name('books.index');

/* book */
Route::resource('books', BookController::class, ['only' => ['create', 'store', 'show']]);
Route::get('/search', [BookController::class, 'search'])->name('books.search');

/* review */
Route::middleware('auth')->group(function(){
    Route::resource('books.reviews', ReviewController::class, ['only' => ['create']]);
    Route::resource('books.users.reviews', ReviewController::class, ['only' => ['store', 'edit', 'update', 'destroy']]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
