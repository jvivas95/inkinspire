<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;

class ReviewTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // Authenticated user can create a review
    public function test_authenticated_user_can_create_review(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();
        $response = $this->actingAs($user)->post('/reviews', [
            'body' => 'This is a great book! I really enjoyed it.',
            'rating' => 5,
            'book_id' => $book->id,
        ]);
        $response->assertStatus(302);
    }

    // User cannot create 2 reviews for the same book
    public function test_user_cannot_create_multiple_reviews_for_same_book(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();
        $this->actingAs($user)->post('/reviews', [
            'body' => 'This is a great book! I really enjoyed it.',
            'rating' => 5,
            'book_id' => $book->id,
        ]);
        $response = $this->actingAs($user)->post('/reviews', [
            'body' => 'This is a great book! I really enjoyed it.',
            'rating' => 5,
            'book_id' => $book->id,
        ]);
        $response->assertSessionHas('error');
    }

    // Unauthenticated user redirected to login when trying to create a review
    public function test_unauthenticated_user_redirected_to_login(): void
    {
        $book = Book::factory()->create();
        $response = $this->post('/reviews', [
            'body' => 'This is a great book! I really enjoyed it.',
            'rating' => 5,
            'book_id' => $book->id,
        ]);
        $response->assertRedirect('/login');
    }

    // User cannot delete another user's review
    public function test_user_cannot_delete_another_users_review(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $book = Book::factory()->create();
        $review = $this->actingAs($user1)->post('/reviews', [
            'body' => 'This is a great book! I really enjoyed it.',
            'rating' => 5,
            'book_id' => $book->id,
        ]);
        $review = \App\Models\Review::first();
        $response = $this->actingAs($user2)->delete("/reviews/{$review->id}");
        $response->assertStatus(403);
    }
}
