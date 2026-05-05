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
        // Make a request to the Google Books API
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $query,
            'key' => config('services.google_books.key'),
            'maxResults' => 10
        ]);

        if ($response->successful()) {
            return collect($response->json('items') ?? [])->map(function ($item) {
                $info = $item['volumeInfo'] ?? [];
                return [
                    'google_books_id' => $item['id'] ?? null,
                    'title' => $info['title'] ?? null,
                    'author' => $info['authors'][0] ?? null,
                    'description' => $info['description'] ?? null,
                    'cover_image' => $info['imageLinks']['thumbnail'] ?? null,
                    'published_year' => isset($info['publishedDate']) ? substr($info['publishedDate'], 0, 4) : null,
                    'genre' => $info['categories'][0] ?? null
                ];
            })->toArray();
        } else {
            // Handle error response
            // throw new Exception('Failed to fetch data from Google Books API');
            return [];
        }
    }

    public function getById($googleBooksId)
    {
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $googleBooksId,
            'key' => config('services.google_books.key')
        ]);

        if ($response->successful()) {
            $item = $response->json('items')[0] ?? null;
            if ($item) {
                $info = $item['volumeInfo'] ?? [];
                return [
                    'google_books_id' => $item['id'] ?? null,
                    'title' => $info['title'] ?? null,
                    'author' => $info['authors'][0] ?? null,
                    'description' => $info['description'] ?? null,
                    'cover_image' => $info['imageLinks']['thumbnail'] ?? null,
                    'published_year' => isset($info['publishedDate']) ? substr($info['publishedDate'], 0, 4) : null,
                    'genre' => $info['categories'][0] ?? null
                ];
            }
        } else {
            // Handle error response
            throw new Exception('Failed to fetch data from Google Books API');
        }
    }
}
