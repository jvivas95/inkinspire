<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookFavorite;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookFavoriteController extends Controller
{
    //
    public function store(Request $request, Book $book)
    {
        $favorite = BookFavorite::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
        }
        else {
            BookFavorite::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
            ]);
        }

        return redirect()->route('books.show', $book->id)->with('success', 'Tu favorito ha sido registrado.');
    }
}
