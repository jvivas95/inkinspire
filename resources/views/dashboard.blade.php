<x-app-layout>
    <x-slot name="title">
        Dashboard - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    {{-- Principal container --}}
    <div class="container mx-auto px-4 py-6 space-y-6">

        {{-- Statistics component --}}
        <x-statistics-books
            :read="$read"
            :want-to-read="$wantToRead"
            :reading="$reading"
        />

        {{-- Statistics cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Read container --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p>Leídos</p>
                </div>
                {{-- List of books in read list --}}
                <div class="flex flex-col gap-4">
                    @foreach ($read as $entry)
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                            <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                                {{ $entry->book->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Want to Read container --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p>Quiero Leer</p>
                </div>
                {{-- List of books in want to read list --}}
                <div class="flex flex-col gap-4">
                    @foreach ($wantToRead as $entry)
                    <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                        <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                            {{ $entry->book->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Reading container --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p>Leyendo actualmente</p>
                </div>
                {{-- List of books currently reading --}}
                <div class="flex flex-col gap-4">
                    @foreach ($reading as $entry)
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                            <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                                {{ $entry->book->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Favorite Books container --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-6 border-b pb-2 text-xl font-semibold text-center">
                <p class="text-[#064E3B]">Mis libros favoritos</p>
            </div>

            @if($favoriteBooks->isEmpty())
                <p class="text-gray-500 text-sm text-center py-4">Aún no tienes libros en tus favoritos.</p>
            @else
                <div class="favorites-carousel flex gap-6 overflow-x-auto pb-4 scroll-smooth" style="-webkit-overflow-scrolling: touch; scrollbar-width: none;">
                    @foreach ($favoriteBooks as $favorite)
                    <div class="bg-[#064E3B] p-3 rounded-md">
                        <a href="{{ route('books.show', $favorite->book->id) }}"
                        class="flex-shrink-0 w-36 flex flex-col items-center group">
                            @if($favorite->book->cover_image)
                                <img src="{{ $favorite->book->cover_image ?? asset('images/default-book.png')}}"
                                    alt="{{ $favorite->book->title }}"
                                    class="w-36 h-52 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow duration-100"
                                    onerror="if (this.src != '{{ asset('images/default-book.png') }}') { this.src = '{{ asset('images/default-book.png') }}'; }">
                            @else
                                <div class="w-36 h-52 rounded-lg shadow-md flex items-center justify-center p-3 text-center"
                                    style="background: #064E3B;">
                                    <span class="text-xs font-bold text-white line-clamp-4">{{ $favorite->book->title }}</span>
                                </div>
                            @endif
                            <p class="text-xs mt-2 text-center line-clamp-2 pb-1 text-white group-hover:text-[#D4AF37] transition-colors">
                                {{ $favorite->book->title }}
                            </p>
                            <p class="text-xs text-gray-400 truncate w-full text-center">{{ $favorite->book->author }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

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
