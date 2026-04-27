<?php

namespace App\Services;

use SebastianBergmann\CodeCoverage\Test\Target\Method;
use function Laravel\Prompts\search;
use Illuminate\Support\Facades\Http;
use Exception;

class GoogleBooksService
{
    public function search($query)
    {
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $query,
            'key' => config('services.google_books.key'),
            'maxResults' => 10

        ]);
        if ($response->successful()) {
            return $response->json();
        } else {
            // Handle error response
            throw new Exception('Failed to fetch data from Google Books API');
        }
    }
}
