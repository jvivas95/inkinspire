<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadingList;
use App\Models\Review;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $userReadingList = ReadingList::where('user_id', Auth::id())->get();

        $wantToRead = $userReadingList->where('status', 'want_to_read')->take(5);
        $reading = $userReadingList->where('status', 'reading')->take(5);
        $read = $userReadingList->where('status', 'read')->take(5);

        $latestReviews = Review::where('user_id', Auth::id())
                                ->with('book')
                                ->latest()
                                ->take(5)
                                ->get();

        $topRatedBooks = Book::orderBy('average_rating', 'desc')
                            ->take(5)
                            ->get();

        return view('dashboard', compact('userReadingList', 'wantToRead', 'reading', 'read', 'latestReviews', 'topRatedBooks'));
    }
}
