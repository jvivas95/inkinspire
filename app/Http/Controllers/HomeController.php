<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $totalBooks = Book::count();
        $totalUsers = User::count();
        $totalReviews = Review::count();
        $latestReviews = Review::with(['user', 'book'])->latest()->take(5)->get();
        $topBooks = Book::where('ratings_count', '>', 0)->orderByDesc('average_rating')->take(5)->get();
        return view('welcome', compact('totalBooks', 'totalUsers', 'totalReviews', 'latestReviews', 'topBooks'));
    }
}
