<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('google_books_id')->unique();
            $table->string('title');
            $table->text('author')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->year('published_year')->nullable();
            $table->string('genre')->nullable();
            $table->decimal('average_rating', 3, 2)->nullable()->default(0);
            $table->integer('ratings_count')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
