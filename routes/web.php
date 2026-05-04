<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Models\Review;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('books', BookController::class);
    Route::resource('reviews', ReviewController::class)->only(['store', 'edit', 'update', 'destroy']);
});


// Route::get('/test-books', function () {
//     $service = new \App\Services\GoogleBooksService();
//     $results = $service->search('Harry Potter');
//     dd($results);
// });

// Route::get('/test-book/{id}', function ($id) {
//     $service = new \App\Services\GoogleBooksService();
//     $results = $service->getById($id);
//     dd($results);
// });

require __DIR__.'/auth.php';
