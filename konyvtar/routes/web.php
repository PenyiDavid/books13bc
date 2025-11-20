<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\GenreController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Models\Genre;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/genres',[GenreController::class,'index'])->name('genres.index');

Route::get('/new-genre', function(){
    return view('genres.new-genre');
});
Route::post('/new-genre', [GenreController::class, 'store'])->name('genres.store');


Route::get('/new-book', function() {
    $genres = Genre::all();
    return view('books.store', compact('genres'));
});
Route::post('/new-book', [BookController::class, 'store'])->name('books.store');
Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
Route::get('/new-borrowing', function(){
    $books = Book::whereDoesntHave('borrowings', function($query){
        $query->whereNull('book_borrowing.back_date');
    })->get();
})->name('borrowings.store');