<x-app-layout>
    <x-slot name="title">
        {{ $publicUser->name }} - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">

        <x-profile-header
            :user="$publicUser"
            :is-owner="auth()->id() === $publicUser->id"
            :is-following="$isFollowing"
            :read-count="$read->count()"
            :reading-count="$reading->count()"
            :want-to-read-count="$wantToRead->count()"
        />

        <div class="container mx-auto px-4 py-6 space-y-6">
            {{-- @php
                $books = $publicUser->books ?? collect();
            @endphp

            @if($books->count())
                <div class="grid grid-cols-3 gap-1">
                    @foreach($books as $book)
                        <a href="{{ url('books/'.$book->id) }}" class="block">
                            <img src="{{ Storage::url($book->cover ?? 'images/book-placeholder.png') }}" alt="{{ $book->title ?? 'Book' }}" class="w-full h-40 object-cover">
                        </a>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">
                    Este usuario no ha publicado nada todavía.
                </div>
            @endif --}}

            {{-- Statistics cards --}}
            <x-statistics-books-cards
                :read="$read"
                :want-to-read="$wantToRead"
                :reading="$reading"
            />

            {{-- Favorite Books container --}}
            <x-favorite-books :favorite-books="$favoriteBooks" />

        </div>
    </div>
</x-app-layout>
