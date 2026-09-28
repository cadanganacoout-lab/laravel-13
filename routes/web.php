<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('book.index'));

Route::resource('book', BookController::class);
Route::get('book-datatable', [BookController::class,'datatable'])->name('book.datatable');

require __DIR__.'/auth.php';
