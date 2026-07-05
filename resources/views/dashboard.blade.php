<x-app-layout>
    <x-slot name="title">
        Dashboard - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    {{-- Principal container --}}
    <div class="max-w-4xl mx-auto py-8">

        {{-- Profile --}}
        <x-profile-header
            :user="Auth::user()"
            :is-owner="true"
            :read-count="$read->count()"
            :reading-count="$reading->count()"
            :want-to-read-count="$wantToRead->count()"
        />

        {{-- Statistics cards --}}
        <x-statistics-books-cards
            :read="$read"
            :want-to-read="$wantToRead"
            :reading="$reading"
        />

        {{-- Favorite Books container --}}
        <x-favorite-books :favorite-books="$favoriteBooks" />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Latest Reviews container --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p>Últimas reseñas</p>
                </div>
                {{-- List of latest reviews --}}
                <div class="flex flex-col gap-4">
                    @foreach ($latestReviews as $review)
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                            <a href="{{ route('books.show', $review->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                                {{ $review->book->title }}
                            </a>
                            <p class="text-sm md:text-base">{{ $review->rating }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Top Rated Books container --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p>Libros mejor valorados</p>
                </div>
                {{-- List of top rated books --}}
                <div class="flex flex-col gap-4">
                    @foreach ($topRatedBooks as $book)
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                            <a href="{{ route('books.show', $book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                                {{ $book->title }}
                            </a>
                            <p class="md:text-base text-[#D4AF37] text-2xl font-bold">{{ $book->average_rating }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
