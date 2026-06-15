<x-app-layout>
    <x-slot name="title">
        Books - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <div class="container mx-auto px-4 py-6 space-y-6">
        {{-- Search and Filters Card --}}
        <div class="bg-white shadow-md rounded-lg p-6" x-data="{ tab: '{{ request('tab', 'search') }}' }">

            {{-- Título --}}
            <div class="mb-6 border-b pb-2 text-xl font-semibold text-center">
                <p class="text-[#064E3B]">Buscar Libros</p>
            </div>

            {{-- Botones toggle --}}
            <div class="flex gap-2 mb-6 bg-gray-100 p-1 rounded-lg w-fit mx-auto">
                <button @click="tab = 'search'"
                    :class="tab === 'search' ? 'bg-[#064E3B] text-white shadow' : 'text-gray-600 hover:text-[#064E3B]'"
                    class="px-6 py-2 rounded-md font-medium text-sm transition-colors duration-200">
                    🔍 Buscar nuevo libro
                </button>
                <button @click="tab = 'explore'"
                    :class="tab === 'explore' ? 'bg-[#064E3B] text-white shadow' : 'text-gray-600 hover:text-[#064E3B]'"
                    class="px-6 py-2 rounded-md font-medium text-sm transition-colors duration-200">
                    📚 Explorar catálogo
                </button>
            </div>

            {{-- Formulario buscar en Google Books --}}
            <div x-show="tab === 'search'">
                <form method="GET" action="{{ route('books.index') }}" class="space-y-4">
                    <input type="hidden" name="tab" value="search">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Título</label>
                            <input type="text" name="q" placeholder="Buscar por título..."
                                value="{{ request('q') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Autor</label>
                            <input type="text" name="author" placeholder="Buscar por autor..."
                                value="{{ request('author') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 bg-[#064E3B] text-white rounded-lg text-sm font-semibold hover:bg-[#D4AF37] transition">
                            Buscar
                        </button>
                    </div>
                    @if(request('q') || request('author'))
                        <div class="mb-6 rounded-xl border border-gray-200 bg-gray-50 p-4 shadow-sm">
                            <div class="mb-3 flex items-center justify-between gap-3">
                                <div>
                                    <p class="text-sm font-semibold text-[#064E3B]">Filtrar resultados por año</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-3 md:grid-cols-[1fr_1fr_auto] md:items-end">
                                <input type="hidden" name="tab" value="search">
                                <input type="hidden" name="q" value="{{ request('q') }}">
                                <input type="hidden" name="author" value="{{ request('author') }}">
                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:items-end">
                                    <div>
                                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wide text-[#064E3B]">Año desde</label>
                                        <input type="number" name="year_from" placeholder="Ej: 1980"
                                            value="{{ request('year_from') }}" min="1800" max="{{ date('Y') }}"
                                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm shadow-sm focus:border-[#064E3B] focus:outline-none focus:ring-2 focus:ring-[#064E3B]/20">
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wide text-[#064E3B]">Año hasta</label>
                                        <input type="number" name="year_to" placeholder="Ej: 1990"
                                            value="{{ request('year_to') }}" min="1800" max="{{ date('Y') }}"
                                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm shadow-sm focus:border-[#064E3B] focus:outline-none focus:ring-2 focus:ring-[#064E3B]/20">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 sm:flex-row md:justify-end">
                                    <a href="{{ route('books.index', ['tab' => request('tab', 'search')]) }}"
                                        class="inline-flex items-center justify-center rounded-lg bg-[#dc2626] px-6 py-2 text-sm font-semibold text-white transition hover:bg-[#b91c1c]">
                                        Limpiar filtros
                                    </a>
                                    <button type="submit"
                                        class="inline-flex items-center justify-center rounded-lg bg-[#064E3B] px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#D4AF37]">
                                        Aplicar año
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                </form>
            </div>

            {{-- Formulario explorar catálogo local --}}
            <div x-show="tab === 'explore'">
                <form method="GET" action="{{ route('books.index') }}" class="space-y-4">
                    <input type="hidden" name="tab" value="explore">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Título</label>
                            <input type="text" name="title" placeholder="Buscar por título..."
                                value="{{ request('title') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Autor</label>
                            <input type="text" name="author" placeholder="Buscar por autor..."
                                value="{{ request('author') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Género</label>
                            <select name="genre"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                                <option value="">Todos los géneros</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                                        {{ $genre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Año desde</label>
                            <input type="number" name="year_from" placeholder="Ej: 1980"
                                value="{{ request('year_from') }}" min="1800" max="{{ date('Y') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Año hasta</label>
                            <input type="number" name="year_to" placeholder="Ej: 1990"
                                value="{{ request('year_to') }}" min="1800" max="{{ date('Y') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Puntuación mínima</label>
                            <select name="min_rating"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                                <option value="">Cualquier puntuación</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ request('min_rating') == $i ? 'selected' : '' }}>
                                        {{ $i }} ★ o más
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#064E3B] mb-1">Ordenar por</label>
                            <select name="sort"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#064E3B]">
                                <option value="">Más recientes</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Mejor puntuados</option>
                                <option value="reviews" {{ request('sort') == 'reviews' ? 'selected' : '' }}>Más reseñados</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('books.index', ['tab' => request('tab', 'explore')]) }}"
                           class="px-6 py-2 bg-[#dc2626] text-white rounded-lg text-sm font-semibold hover:bg-[#b91c1c] transition">
                            Limpiar filtros
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-[#064E3B] text-white rounded-lg text-sm font-semibold hover:bg-[#D4AF37] transition">
                            Filtrar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Books Grid Card --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                <p class="text-[#064E3B]">Libros</p>
            </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($books as $book)
                        <div class="book-card bg-gray-100 p-4 rounded-lg flex flex-col items-center">
                            <img src="{{ data_get($book, 'cover_image') ?? asset('images/default-book.png') }}"
                            alt="{{ data_get($book, 'title') }} cover"
                            class="w-32 h-48 object-cover mb-2 shadow-md"
                            onerror="if (this.src != '{{ asset('images/default-book.png') }}') { this.src = '{{ asset('images/default-book.png') }}'; }">

                            <h2 class="text-xl font-bold text-center">{{ data_get($book, 'title') }}</h2>
                            <p class="text-center">{{ data_get($book, 'author') }}</p>
                            <form method="POST" action="{{ route('books.store') }}" class="mt-2">
                                @csrf
                                <input type="hidden" name="google_books_id" value="{{ data_get($book, 'google_books_id') }}">
                                <input type="hidden" name="title" value="{{ data_get($book, 'title') }}">
                                <input type="hidden" name="author" value="{{ data_get($book, 'author') }}">
                                <input type="hidden" name="description" value="{{ data_get($book, 'description') }}">
                                <input type="hidden" name="cover_image" value="{{ data_get($book, 'cover_image') }}">
                                <input type="hidden" name="published_year" value="{{ data_get($book, 'published_year') }}">
                                <input type="hidden" name="genre" value="{{ data_get($book, 'genre') }}">
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
        </div>
    </div>

    <style>
        .book-card {
            transition: all 0.3s ease;
        }
        .book-card:hover {
            transform: scale(1.05);
            background-color: #064E3B;
        }
        .book-card:hover h2,
        .book-card:hover p {
            color: white;
        }
        .book-card:hover button {
            background-color: #D4AF37;
        }
    </style>
</x-app-layout>
