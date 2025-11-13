<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'book_title' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'publish_year' => 'integer|min:1|max:3000',
            'genre_id' => 'required|exists:genres,id'
        ]);
        Book::create([
            'title' => $request['book_title'],
            'author' => $request['book_author'],
            'genre_id' => $request['genre_id'],
            'publish_year' => $request['publish_year']
        ]);
        return redirect()->route('genres.index')->with('success','Sikerült!');
    }

    public function index(){
        $books = Book::all();
        return view('books.index', compact('books'));
    }
}
