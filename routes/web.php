<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReadingListController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Models\ReadingList;
use App\Models\Review;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/keep-alive', function () {
    return 'I\'m alive!';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', BookController::class);
    Route::resource('reviews', ReviewController::class)->only(['store', 'edit', 'update', 'destroy']);
    Route::post('reading-list', [ReadingListController::class, 'store'])->name('reading-list.store');
    Route::delete('reading-list/{readingList}', [ReadingListController::class, 'destroy'])->name('reading-list.destroy');
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
