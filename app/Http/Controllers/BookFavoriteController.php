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

            return redirect()->route('books.show', $book->id)->with('delete', 'Eliminado de favoritos');
        }
        else {
            BookFavorite::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
            ]);
        }

        return redirect()->route('books.show', $book->id)->with('success', 'Añadido a libros favoritos');
    }
}
