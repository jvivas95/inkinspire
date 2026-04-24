<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Review;
use App\Models\ReadingList;

class Book extends Model
{
    protected $fillable = [
        'google_books_id',
        'title',
        'author',
        'description',
        'cover_image',
        'published_year',
        'genre',
        'average_rating',
        'ratings_count',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function readingLists(): HasMany
    {
        return $this->hasMany(ReadingList::class);
    }
}
