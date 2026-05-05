<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadingList;
use Illuminate\Support\Facades\Auth;


class ReadingListController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'status' => 'required|in:want_to_read,reading,read',
        ]);

        ReadingList::updateOrCreate(
            ['user_id' => Auth::id(),
            'book_id' => $request->input('book_id')],
            ['status' => $request->input('status')]
        );

        return redirect()->route('books.show', $request->input('book_id'))->with('success', 'Libro agregado a tu lista de lectura.');
    }

    public function destroy(string $id)
    {
        $readingList = ReadingList::findOrFail($id);
        $bookId = $readingList->book_id;
        $readingList->delete();

        return redirect()->route('books.show', $bookId)->with('success', 'Libro eliminado de tu lista de lectura.');
    }
}
