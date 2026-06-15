<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use App\Services\GoogleBooksService;
use Illuminate\Support\Facades\Artisan;
use Mockery;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    public function test_default_tab_is_search_on_books_index(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/books');

        $response->assertStatus(200);
        $response->assertSee("x-data=\"{ tab: 'search' }\"");
    }

    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh');
    }

    public function test_explore_tab_uses_local_catalog_instead_of_google_api(): void
    {
        $user = User::factory()->create();
        Book::factory()->create([
            'title' => 'Pride and Prejudice',
            'author' => 'Jane Austen',
        ]);

        $googleBooks = Mockery::mock(GoogleBooksService::class);
        $googleBooks->shouldNotReceive('search');
        $this->app->instance(GoogleBooksService::class, $googleBooks);

        $response = $this->actingAs($user)->get('/books?tab=explore&author=Jane');

        $response->assertStatus(200);
        $response->assertSee('Pride and Prejudice');
    }

    public function test_search_tab_still_uses_google_books_api(): void
    {
        $user = User::factory()->create();

        $googleBooks = Mockery::mock(GoogleBooksService::class);
        $googleBooks->shouldReceive('search')
            ->once()
            ->with('Dune', 'Frank Herbert')
            ->andReturn([]);
        $this->app->instance(GoogleBooksService::class, $googleBooks);

        $response = $this->actingAs($user)->get('/books?tab=search&q=Dune&author=Frank Herbert');

        $response->assertStatus(200);
    }
}
