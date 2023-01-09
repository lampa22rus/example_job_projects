<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'edition',
        'year',
        'isbn'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class,'book_genres','book_id', 'genre_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
    
}


