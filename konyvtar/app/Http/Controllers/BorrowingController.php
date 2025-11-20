<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;

class BorrowingController extends Controller
{
    public function index(){

        $borrowings = Borrowing::query()
        ->whereHas('books', function($query){
            $query->whereNull('back_date');
        })
        ->with(['books' => function($query){
            $query->wherePivotNull('back_date');
        }])
        ->orderBy('created_at', 'desc')
        ->get();

        //dogában ennyi kell
        //$borrowings = Borrowing::with('books')->get();
        return view('borrowing.index', compact('borrowings'));
    }
}
