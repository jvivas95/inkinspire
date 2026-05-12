<x-app-layout>
    <x-slot name="title">
        Dashboard - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    {{-- Principal container --}}
    <div class="container mx-auto px-4 py-6 space-y-6">
        {{-- Statistics container --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                <p class="text-[#064E3B]">Estadísticas</p>
            </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-center">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="truncate text-sm md:text-base">Leídos</p>
                    <p class="text-lg font-semibold">{{ $read->count() }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="truncate text-sm md:text-base">Quiero Leer</p>
                    <p class="text-lg font-semibold">{{ $wantToRead->count() }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="truncate text-sm md:text-base">En Lectura</p>
                    <p class="text-lg font-semibold">{{ $reading->count() }}</p>
                </div>
            </div>
        </div>

        {{-- Statistics cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Reading container --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p>Leyendo actualmente</p>
                </div>
                {{-- List of books currently reading --}}
                <div class="flex flex-col gap-4">
                    @foreach ($reading as $entry)
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                            <a href="{{ route('books.show', $entry->book->id) }}" class="truncate text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
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
                            <a href="{{ route('books.show', $entry->book->id) }}" class="truncate text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                                {{ $entry->book->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Read container --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p>Leídos</p>
                </div>
                {{-- List of books in read list --}}
                <div class="flex flex-col gap-4">
                    @foreach ($read as $entry)
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                            <a href="{{ route('books.show', $entry->book->id) }}" class="truncate text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                                {{ $entry->book->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Latest Reviews container --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p>Últimas reseñas</p>
                </div>
                {{-- List of latest reviews --}}
                <div class="flex flex-col gap-4">
                    @foreach ($latestReviews as $review)
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                            <a href="{{ route('books.show', $review->book->id) }}" class="truncate text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
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
                            <a href="{{ route('books.show', $book->id) }}" class="truncate text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
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
