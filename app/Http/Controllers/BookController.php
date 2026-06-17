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

        $isGoogleSearch = $request->input('tab') === 'search'
            && ($request->filled('q') || $request->filled('author'));

        if ($isGoogleSearch) {
            $value = trim((string) $request->input('q'));
            $author = trim((string) $request->input('author'));
            $books = $this->googleBooks->search($value, $author);

            $books = collect($books)
                ->when($request->filled('year_from'), function ($collection) use ($request) {
                    return $collection->filter(fn($book) => (int) ($book['published_year'] ?? 0) >= (int) $request->input('year_from'));
                })
                ->when($request->filled('year_to'), function ($collection) use ($request) {
                    return $collection->filter(fn($book) => (int) ($book['published_year'] ?? 0) <= (int) $request->input('year_to'));
                })
                ->values()
                ->all();
        }
        else {
            $query = Book::query();

            if ($request->filled('author')) {
                $query->where('author', 'like', '%' . $request->input('author') . '%');
            }

            if ($request->filled('title')) {
                $query->where('title', 'like', '%' . $request->input('title') . '%');
            }

            if ($request->filled('genre')) {
                $query->where('genre', $request->input('genre'));
            }

            if ($request->filled('year_from')) {
                $query->where('published_year', '>=', $request->input('year_from'));
            }

            if ($request->filled('year_to')) {
                $query->where('published_year', '<=', $request->input('year_to'));
            }

            if ($request->filled('min_rating')) {
                $query->where('average_rating', '>=', $request->input('min_rating'));
            }

            switch ($request->input('sort')) {
                case 'rating':
                    $query->orderBy('average_rating', 'desc');
                    break;
                case 'reviews':
                    $query->orderBy('ratings_count', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }

            $books = $query->paginate(12);

            }

        $genres = Book::whereNotNull('genre')->distinct()->pluck('genre');

        return view('books.index', compact('books', 'genres'));
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
            $book = Book::create($request->only([
                'google_books_id',
                'title',
                'author',
                'description',
                'cover_image',
                'published_year',
                'genre'
            ]));

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
        $userReadingList = optional(Auth::user())->readingLists()->where('book_id', $id)->first();
        $reviews = $book->reviews()->with(['user', 'likes'])->latest()->paginate(10);
        $isFavorite = optional(Auth::user())->bookFavorites()->where('book_id', $book->id)->exists();
        $sort = request()->input('sort', 'likes');
        $reviews = $book->reviews()
            ->with(['user', 'likes'])
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('books.show', compact('book', 'userReview', 'userReadingList', 'reviews', 'isFavorite'));
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
