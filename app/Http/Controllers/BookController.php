<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleBooksService;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    protected $googleBooks;

    public function __construct(GoogleBooksService $googleBooks)
    {
        $this->googleBooks = $googleBooks;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        if ($request->has('q')){
            $value = $request->input('q');
            $books = $this->googleBooks->search($value);
        }
        else {
            $books = Book::paginate(12);
        }

        return view('books.index', compact('books'));
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
    public function store(Request $request)
    {
        //
        $googleBooksId = $request->input('google_books_id');
        $result = Book::where('google_books_id', $googleBooksId)->first();
        if ( $result == null ){
            $booksValues = $this->googleBooks->getById($googleBooksId);
            $book = Book::create($booksValues);

            return redirect()->route('books.show', $book->id);
        }

        else {
            return redirect()->route('books.show', $result->id);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book = Book::findOrFail($id);
        $userReview = optional(Auth::user())->reviews()->where('book_id', $id)->first();
        return view('books.show', compact('book', 'userReview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
