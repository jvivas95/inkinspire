<x-app-layout>
    <form method="GET" action="{{ route('books.index') }}">
        <div>
            <x-input-label for="search" :value="__('Search')" />
            <x-text-input id="search" class="block mt-1 w-full" type="text" name="q" :value="request('q')" autocomplete="off" />
            <x-input-error :messages="$errors->get('q')" class="mt-2" />
        </div>
    </form>
    <form method="GET" action="{{ route('books.index') }}" class="mt-4">
        <div>
            @if (!request('q'))
                <select name="genre" id="genre" class="block mt-1 w-full">
                    <option value="">Todos los géneros</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                            {{ $genre }}
                        </option>
                    @endforeach
                </select>
                <div>
                    <select id="sort" name="sort" class="list-disc pl-5 mt-1 w-full">
                        <option value="">Ordenar por:</option>
                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Mejor puntuados</option>
                        <option value="reviews" {{ request('sort') == 'reviews' ? 'selected' : '' }}>Más reseñados</option>
                        <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Más recientes</option>
                    </select>
                    <x-input-error :messages="$errors->get('sort')" class="mt-2" />
                </div>
                <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded" type="submit">Filtrar</button>
            @endif
        </div>
    </form>
    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 pl-4 pr-4">
        @if(empty($books) && request('q'))
            <p class="text-center text-gray-500">No se encontraron resultados. Inténtalo de nuevo más tarde.</p>
        @endif
        @foreach ($books as $book)
            <div class=" border p-3 rounded-lg flex flex-col items-center">
                <img src="{{ data_get($book, 'cover_image') ?? asset('images/default-book.png') }}"
                alt="{{ data_get($book, 'title') }} cover"
                class="w-32 h-48 object-cover mb-2 shadow-md"
                onerror="if (this.src != '{{ asset('images/default-book.png') }}') { this.src = '{{ asset('images/default-book.png') }}'; }">

                <h2 class="text-xl font-bold">{{ data_get($book, 'title') }}</h2>
                <p>{{ data_get($book, 'author') }}</p>
                {{-- Details form --}}
                <form method="POST" action="{{  route('books.store') }}">
                    @csrf
                    <input type="hidden" name="google_books_id" value="{{ data_get($book, 'google_books_id') }}">
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded" type="submit">Ver detalles</button>
                </form>
            </div>
        @endforeach

            @if (is_object($books) && method_exists($books, 'links'))
                {{ $books->links() }}
            @endif

    </div>
</x-app-layout>
