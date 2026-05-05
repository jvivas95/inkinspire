<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     */
    public function created(Review $review): void
    {
        //
        $book = $review->book;
        $book->average_rating = $book->reviews()->avg('rating') ?? 0;
        $book->ratings_count = $book->reviews()->count();
        $book->save();
    }

    /**
     * Handle the Review "updated" event.
     */
    public function updated(Review $review): void
    {
        //
        $book = $review->book;
        $book->average_rating = $book->reviews()->avg('rating') ?? 0;
        $book->ratings_count = $book->reviews()->count();
        $book->save();
    }

    /**
     * Handle the Review "deleted" event.
     */
    public function deleted(Review $review): void
    {
        //
        $book = $review->book;
        $book->average_rating = $book->reviews()->avg('rating') ?? 0;
        $book->ratings_count = $book->reviews()->count();
        $book->save();
    }

    /**
     * Handle the Review "restored" event.
     */
    public function restored(Review $review): void
    {
        //
    }

    /**
     * Handle the Review "force deleted" event.
     */
    public function forceDeleted(Review $review): void
    {
        //
    }
}
