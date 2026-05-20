<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookFavorite extends Model
{
    //
    protected $fillable = [
        'user_id',
        'book_id',
    ];

    public $timestamps = false;

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
