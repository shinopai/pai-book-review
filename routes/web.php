<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/* root */
Route::get('/', [BookController::class, 'index'])->name('books.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
