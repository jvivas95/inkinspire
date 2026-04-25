<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        Book::factory(30)->create();

        foreach (User::all() as $user) {
            $books = Book::all()->random(rand(3,8));
            foreach ($books as $book) {
                Review::factory()->create([
                    "user_id"=> $user->id,
                    'book_id' => $book->id,
                    'body' => fake()->paragraph(),
                    'rating' => fake()->numberBetween(1, 5),
                ]);
            }
        }
    }
}
