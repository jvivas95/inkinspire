<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        //

        $exist = Review::where('user_id', Auth::id())
            ->where('book_id', $request->input('book_id'))
            ->exists();
        if ($exist) {
            return redirect()->back()->with('error', 'Ya has reseñado este libro.');
        }

        $review = Review::create([
            'user_id' => Auth::id(),
            'book_id' => $request->input('book_id'),
            'body' => $request->input('body'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('books.show', $request->input('book_id'))->with('success', 'Reseña creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $review = Review::findOrFail($id);
        if ($review->user_id !== Auth::id()){
            abort(403);
        }

        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, string $id)
    {
        //
        $review = Review::findOrFail($id);
        $this->authorize('update', $review);

        $request->validate([
            'body' => 'required|string|min:20|max:2000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update([
            'body' => $request->input('body'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('books.show', $review->book_id)->with('success', 'Reseña actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $review = Review::findOrFail($id);

        $this->authorize('delete', $review);

        $review->delete();

        return redirect()->route('books.show', $review->book_id)->with('success', 'Reseña eliminada exitosamente.');
    }
}
