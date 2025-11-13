<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function borrowings() {
        return $this->belongsToMany(Borrowing::class, "book_borrowing")->withPivot("back_date");
    }

    protected $fillable = [
        'title',
        'author',
        'genre_id',
        'publish_year'
    ];
}
