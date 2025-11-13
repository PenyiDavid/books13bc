<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        return view('genres.index',compact('genres'));
    }

    public function store(Request $request){
        $request->validate([
            'genre_name' => 'required|string|max:30|unique:genres'
        ]);

        Genre::create([
           'genre_name' => $request['genre_name'] 
        ]);
    return redirect()->route('genres.index')->with('success','Sikerült!');
        
    }
}
