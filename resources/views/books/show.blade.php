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
                <p class="text-[#064E3B]">Reseñas</p>
            </div>
            @if ($userReview)
            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                <p class="font-semibold">{{ $userReview->user->name }}</p>
                <p class="text-sm text-gray-600">Publicado: {{ $userReview->updated_at->diffForHumans(['short' => true]) }}</p>
                <p class="mt-2 text-black">{{ data_get($userReview, 'body') }}</p>
                <div class="flex gap-2 mt-4">
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
