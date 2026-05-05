<x-app-layout>
    {{-- Container --}}
    <div class="w-auto h-auto p-4 justify-center mx-auto content-center border border-solid-gray-300 rounded">
        {{-- Title --}}
        <h2 class="text-">Información del Libro</h2>
        <div class="flex flex-col md:flex-row gap-4">
            {{-- Left Column info --}}
            <div class="border p-4 mb-4 w-full md:w-1/3 items-center justify-center content-center">
                <img src="{{ data_get($book, 'cover_image') }}" alt="{{ data_get($book, 'title') }} cover" class="w-32 h-auto mb-2 justify-center content-center m-auto">
                <h2 class="text-xl font-bold text-center border border-solid">{{ data_get($book, 'title') }}</h2>
                <form method="POST" action="{{ route('reading-list.store') }}" class="flex justify-center gap-2 mt-4">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">

                    <button type="submit" name="status" value="read"
                        class="mt-2 px-4 py-2 rounded bg-green-500 text-white {{ $userReadingList?->status == 'read' ? 'border-2 border-green-700' : ' ' }}">
                        Leído
                    </button>

                    <button type="submit" name="status" value="reading"
                        class="mt-2 px-4 py-2 rounded bg-yellow-500 text-white {{ $userReadingList?->status == 'reading' ? 'border-2 border-yellow-700' : ' ' }}">
                        Leyendo
                    </button>

                    <button type="submit" name="status" value="want_to_read"
                        class="mt-2 px-4 py-2 rounded bg-blue-500 text-white {{ $userReadingList?->status == 'want_to_read' ? 'border-2 border-blue-700' : ' ' }}">
                        Quiero Leer
                    </button>
                </form>

                @if ($userReadingList)
                <form method="POST" action="{{ route('reading-list.destroy', $userReadingList->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mt-2 px-4 py-2 rounded bg-red-500 text-white">
                        Eliminar de la lista
                    </button>
                </form>

                @endif
            </div>

            {{-- Right Column info --}}
            <div class="border p-4 mb-4 w-full md:w-2/3">
                <div class="flex gap-2">
                    <p class="font-bold">Título:</p>
                    <p class="">{{ data_get($book, 'title') }}</p>
                </div>
                <div class="flex gap-2">
                    <p class="font-bold">Autor:</p>
                    <p class="">{{ data_get($book, 'author') }}</p>
                </div>
                <div class="flex gap-2">
                    <p class="font-bold">Año de Publicación:</p>
                    <p class="">{{ data_get($book, 'published_year') }}</p>
                </div>
                <div class="flex gap-2">
                    <p class="font-bold">Género:</p>
                    <p class="">{{ data_get($book, 'genre') }}</p>
                </div>
                <div class="flex flex-col">
                    <p class="font-bold">Descripción:</p>
                    <p class="">{{ data_get($book, 'description') }}</p>
                </div>
                <div class="flex gap-2">
                <p class="font-bold">Puntuación Promedio:</p>
                    <x-star-display :rating="data_get($book, 'average_rating' ?? 0)"></x-star-display>
                    <p class="ml-2">({{ (int)$book->ratings_count }})</p>
                </div>
            </div>
        </div>

        {{-- Review section --}}
        <div>
            @if ($userReview)
            <div>
                <p>{{ $userReview->user->name }}</p>
                <p>Publicado: {{ $userReview->updated_at->diffForHumans(['short' => true]) }}</p>
                <p>{{ data_get($userReview, 'body') }}</p>
                <div class="flex">
                    <button class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded" onclick="document.getElementById('editModal').classList.remove('hidden')">
                        Editar
                    </button>
                    {{-- Edit Modal --}}
                    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div class="bg-white rounded-lg p-6 w-full max-w-lg">
                            {{-- Button to close --}}
                            <button onclick="document.getElementById('editModal').classList.add('hidden')">
                                ✕
                            </button>
                            <h2>Editar reseña</h2>
                            {{-- Edit form --}}
                            <form method="POST" action="{{ route('reviews.update', $userReview->id) }}">
                                @csrf
                                @method('PUT')
                                <div>
                                    {{-- <x-input-label for="body" :value=""></x-input-label> --}}
                                    <textarea id="body" name="body" autocomplete="body">{{ data_get($userReview, 'body') }}</textarea>
                                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                </div>
                                <x-star-rating name="rating" :rating="$userReview->rating" />
                                <button class="mt-2 px-4 py-2 bg-green-500 text-white rounded" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>

                    {{-- Delete review --}}
                    <form method="POST" action="{{ route('reviews.destroy', $userReview->id) }}" class="flex justify-center gap-2 mt-4">
                        @csrf
                        @method('DELETE')
                        <button class="mt-2 px-4 py-2 bg-red-500 text-white rounded" type="submit"> Eliminar </button>
                    </form>
                </div>
            </div>

            @else
            <form method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                {{-- Body review --}}
                <div>
                    <x-input-label for="body" :value="__('Escribe tu reseña')" />
                    <textarea id="body" name="body" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" rows="4" required></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
                <x-star-rating name="rating" :rating="0" />
                <button class="mt-2 px-4 py-2 bg-green-500 text-white rounded" type="submit">Enviar Reseña</button>
            </form>
            @endif
        </div>

    </div>
</x-app-layout>
