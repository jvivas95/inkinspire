<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewLike;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ReviewLiked;

class ReviewLikeController extends Controller
{
    //
    public function store (Request $request, Review $review)
    {

        $like = ReviewLike::where('user_id', Auth::id())
            ->where('review_id', $review->id)
            ->first();

        if ($like) {
            $like->delete();
        }
        else {
            ReviewLike::create([
                'user_id' => Auth::id(),
                'review_id' => $review->id,
            ]);

            // Notify the review owner about the like
            if ($review->user_id !== Auth::id()) {
                $review->user->notify(new ReviewLiked(Auth::user(), $review));
            }
        }

        return redirect()->route('books.show', $review->book->id)->with('success', 'Tu like ha sido registrado.');
    }
}
