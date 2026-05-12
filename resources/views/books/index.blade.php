<x-app-layout>
    <x-slot name="title">
        Books - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <div class="container mx-auto px-4 py-6 space-y-6">
        {{-- Search and Filters Card --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                <p class="text-[#064E3B]">Buscar y Filtrar Libros</p>
            </div>
            <form method="GET" action="{{ route('books.index') }}" class="mb-4">
                <div>
                    <x-input-label for="search" :value="__('Buscar')" />
                    <x-text-input id="search" class="block mt-1 w-full" type="text" name="q" :value="request('q')" autocomplete="off" />
                    <x-input-error :messages="$errors->get('q')" class="mt-2" />
                </div>
                <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded" type="submit">Buscar</button>
            </form>
            @if (!request('q'))
                <form method="GET" action="{{ route('books.index') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700">Género</label>
                            <select name="genre" id="genre" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Todos los géneros</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                                        {{ $genre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="sort" class="block text-sm font-medium text-gray-700">Ordenar por</label>
                            <select id="sort" name="sort" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Ordenar por:</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Mejor puntuados</option>
                                <option value="reviews" {{ request('sort') == 'reviews' ? 'selected' : '' }}>Más reseñados</option>
                                <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Más recientes</option>
                            </select>
                            <x-input-error :messages="$errors->get('sort')" class="mt-2" />
                        </div>
                    </div>
                    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded" type="submit">Filtrar</button>
                </form>
            @endif
        </div>

        {{-- Books Grid Card --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                <p class="text-[#064E3B]">Libros</p>
            </div>
            @if(empty($books) && request('q'))
                <p class="text-center text-gray-500">No se encontraron resultados. Inténtalo de nuevo más tarde.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($books as $book)
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center">
                            <img src="{{ data_get($book, 'cover_image') ?? asset('images/default-book.png') }}"
                            alt="{{ data_get($book, 'title') }} cover"
                            class="w-32 h-48 object-cover mb-2 shadow-md"
                            onerror="if (this.src != '{{ asset('images/default-book.png') }}') { this.src = '{{ asset('images/default-book.png') }}'; }">

                            <h2 class="text-xl font-bold text-center">{{ data_get($book, 'title') }}</h2>
                            <p class="text-center">{{ data_get($book, 'author') }}</p>
                            {{-- Details form --}}
                            <form method="POST" action="{{ route('books.store') }}" class="mt-2">
                                @csrf
                                <input type="hidden" name="google_books_id" value="{{ data_get($book, 'google_books_id') }}">
                                <button class="px-4 py-2 bg-[#064E3B] text-white rounded hover:bg-[#D4AF37]" type="submit">Ver detalles</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                @if (is_object($books) && method_exists($books, 'links'))
                    <div class="mt-6">
                        {{ $books->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
