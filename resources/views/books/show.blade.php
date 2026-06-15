<x-app-layout>
    <x-slot name="title">
        {{ data_get($book, 'title') }} - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <div class="container mx-auto px-4 py-6 space-y-6">
        {{-- Book Information Card --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                <p class="text-[#064E3B]">Información del Libro</p>
            </div>
            <div class="flex flex-col md:flex-row gap-6">
                {{-- Left Column: Cover and Actions --}}
                <div class="w-full md:w-1/3 flex flex-col items-center">
                    <img src="{{ data_get($book, 'cover_image') }}" alt="{{ data_get($book, 'title') }} cover" class="w-48 h-auto mb-4 shadow-md rounded">
                    <h2 class="text-2xl font-bold text-center mb-4">{{ data_get($book, 'title') }}</h2>
                    <form method="POST" action="{{ route('reading-list.store') }}" class="flex flex-col gap-2 w-full">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <button type="submit" name="status" value="read"
                            class="px-4 py-2 rounded bg-[#064E3B] text-white hover:bg-[#D4AF37] {{ $userReadingList?->status == 'read' ? 'border-4 border-[#D4AF37]' : '' }}">
                            Leído
                        </button>
                        <button type="submit" name="status" value="reading"
                            class="px-4 py-2 rounded bg-[#064E3B] text-white hover:bg-[#D4AF37] {{ $userReadingList?->status == 'reading' ? 'border-2 border-[#D4AF37]' : '' }}">
                            Leyendo
                        </button>
                        <button type="submit" name="status" value="want_to_read"
                            class="px-4 py-2 rounded bg-[#064E3B] text-white hover:bg-[#D4AF37] {{ $userReadingList?->status == 'want_to_read' ? 'border-2 border-[#D4AF37]' : '' }}">
                            Quiero Leer
                        </button>
                    </form>
                    @if ($userReadingList)
                    <form method="POST" action="{{ route('reading-list.destroy', $userReadingList->id) }}" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-700 w-full">
                            Eliminar de la lista
                        </button>
                    </form>
                    @endif
                </div>

                {{-- Right Column: Details --}}
                <div class="w-full md:w-2/3 space-y-4">
                    {{-- 🟢 SUCCESS: Added to favorites --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2.5 rounded-md flex justify-between items-center shadow-sm text-sm animate-fade-in">
                            <div class="flex items-center gap-2">
                                <span>✨</span>
                                <span class="font-medium">{{ session('success') }}</span>
                            </div>
                            <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700 font-bold text-lg leading-none">
                                &times;
                            </button>
                        </div>
                    @endif
                    {{-- 🔴 DELETE: Removed from favorites --}}
                    @if (session('delete'))
                        <div class="bg-red-50 border border-red-100 text-red-800 px-4 py-2.5 rounded-md flex justify-between items-center shadow-xs text-sm">
                            <div class="flex items-center gap-2">
                                {{-- Tu SVG de la X roja --}}
                                <svg class="w-4 h-4 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                <span class="font-medium">{{ session('delete') }}</span>
                            </div>
                            <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 font-bold text-lg leading-none">
                                &times;
                            </button>
                        </div>
                    @endif
                    <div class="flex justify-between items-start">
                        <div class="w-auto space-y-4">
                            <div class="flex gap-2">
                                <p class="font-bold text-[#064E3B]">Título:</p>
                                <p class="text-black">{{ data_get($book, 'title') }}</p>
                            </div>
                            <div class="flex gap-2">
                                <p class="font-bold text-[#064E3B]">Autor:</p>
                                <p class="text-black">{{ data_get($book, 'author') }}</p>
                            </div>
                            <div class="flex gap-2">
                                <p class="font-bold text-[#064E3B]">Año de Publicación:</p>
                                <p class="text-black">{{ data_get($book, 'published_year') }}</p>
                            </div>
                        </div>
                        <div class="boder border-solid">
                            <form method="POST" action="{{ route('books.favorite', $book) }}">
                                @csrf
                                <button type="submit" >
                                    @if ($isFavorite)
                                    <img src="{{ asset('images/bookmark_icon_fav.svg') }}" alt="Bookmark Icon" class="w-12 h-12 md:w-16 md:h-16">
                                    @else
                                    <img src="{{ asset('images/bookmark_icon.svg') }}" alt="Bookmark Icon" class="w-12 h-12 md:w-16 md:h-16">
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <p class="font-bold text-[#064E3B]">Género:</p>
                        <p class="text-black">{{ data_get($book, 'genre') }}</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="font-bold text-[#064E3B]">Descripción:</p>
                        <p class="text-black">{{ data_get($book, 'description') }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <p class="font-bold text-[#064E3B]">Puntuación Promedio:</p>
                        <x-star-display :rating="data_get($book, 'average_rating' ?? 0)"></x-star-display>
                        <p class="text-black">({{ (int)$book->ratings_count }})</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Reviews Section Card --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                <p class="text-[#064E3B]">Mi reseña</p>
            </div>
            @if ($userReview)
            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                <a href="{{ route('profile.show', $userReview->user->username) }}" class="font-semibold">
                    {{ $userReview->user->name }} - {{ $userReview->user->username }}
                </a>
                <p class="text-sm text-gray-600">Publicado: {{ $userReview->updated_at->diffForHumans(['short' => true]) }}</p>
                <p class="mt-2 text-black">{{ data_get($userReview, 'body') }}</p>
                <div class="flex gap-2 mt-4 justify-between">
                    <div class="flex gap-2">
                        @can ('update', $userReview)
                        <button class="px-4 py-2 bg-[#064E3B] text-white rounded hover:bg-[#D4AF37]" onclick="document.getElementById('editModal').classList.remove('hidden')">
                            Editar
                        </button>
                        @endcan
                        @can ('delete', $userReview)
                        <form method="POST" action="{{ route('reviews.destroy', $userReview->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700" type="submit">Eliminar</button>
                        </form>
                        @endcan
                    </div>
                    <div class="flex items-center gap-2">
                        <form method="POST" action="{{ route('reviews.like', $userReview) }}">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="flex items-center gap-1 bg-transparent border-none cursor-pointer">
                                <span class="{{ $userReview->isLikedBy(auth()->user()) ? 'text-red-400' : 'text-gray-300' }} text-3xl">♥</span>
                                <span class="text-gray-500 text-sm">{{ $userReview->likes->count() }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <form method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <div class="mb-4">
                    <x-input-label for="body" :value="__('Escribe tu reseña')" />
                    <textarea id="body" name="body" class="text-black block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" rows="4" required></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
                <x-star-rating name="rating" :rating="0" />
                <button class="mt-4 px-4 py-2 bg-[#064E3B] text-white rounded hover:bg-[#D4AF37]" type="submit">Enviar Reseña</button>
            </form>
            @endif
        </div>
        @foreach ($reviews as $review)
            @if($review->id == $userReview?->id)
                @continue
            @endif
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                    <p class="text-[#064E3B]">Reseñas de otros usuarios</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg mb-4 flex flex-col">
                    <a href="{{ route('profile.show', $review->user->username) }}" class="font-semibold">
                        {{ $review->user->name }} - {{ $review->user->username }}
                    </a>
                    <p class="text-sm text-gray-600">Publicado: {{ $review->updated_at->diffForHumans(['short' => true]) }}</p>
                    <p class="mt-2 text-black">{{ data_get($review, 'body') }}</p>
                    <div class="flex justify-end mt-4">
                        <div class="flex gap-2 px-2 py-1">
                            <form method="POST" action="{{ route('reviews.like', $review) }}">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <button type="submit" class="flex items-center gap-1 bg-transparent border-none cursor-pointer">
                                    <span class="{{ $review->isLikedBy(auth()->user()) ? 'text-red-400' : 'text-gray-300' }} text-3xl">♥</span>
                                    <span class="text-gray-500 text-sm">{{ $review->likes->count() }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Edit Review Modal --}}
        @if ($userReview)
            <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg p-6 w-full max-w-lg shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-[#064E3B]">Editar Reseña</h2>
                        <button onclick="document.getElementById('editModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">✕</button>
                    </div>
                    <form method="POST" action="{{ route('reviews.update', $userReview->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="body" class="block text-sm font-medium text-gray-700">Reseña</label>
                            <textarea id="body" name="body" class="text-black block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" rows="4">{{ data_get($userReview, 'body') }}</textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>
                        <x-star-rating name="rating" :rating="$userReview->rating" />
                        <button class="mt-4 px-4 py-2 bg-[#064E3B] text-white rounded hover:bg-[#D4AF37]" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
