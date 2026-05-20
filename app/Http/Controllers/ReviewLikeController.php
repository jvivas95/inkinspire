<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewLike;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

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
        }

        return redirect()->route('books.show', $review->book->id)->with('success', 'Tu like ha sido registrado.');
    }
}
