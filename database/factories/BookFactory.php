<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'google_books_id' => fake()->uuid(),
            'title' => fake()->sentence(3, false),
            'author' => fake()->name(),
            'description' => fake()->paragraph(),
            'cover_image' => fake()->imageUrl(),
            'published_year' => fake()->year(),
            'genre' => fake()->word(),
            'average_rating' => fake()->randomFloat(2, 1, 5),
            'ratings_count' => fake()->numberBetween(0, 1000),
        ];
    }
}
