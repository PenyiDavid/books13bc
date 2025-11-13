<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = ['email'];

    public function books(){
        return $this->belongsToMany(Book::class, "book_borrowing")->withPivot("back_date");
    }
}
