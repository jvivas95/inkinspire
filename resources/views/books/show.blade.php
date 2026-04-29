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
                <form method="POST" action="" class="flex justify-center gap-2 mt-4">
                    @csrf
                    <input type="hidden" name="google_books_id" value="{{ data_get($book, 'google_books_id') }}">
                    <button class="mt-2 px-4 py-2 bg-green-500 text-white rounded" type="submit" name="status" value="read"> Leído </button>
                    <button class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded" type="submit" name="status" value="reading"> Leyendo </button>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded" type="submit" name="status" value="want_to_read"> Quiero Leer </button>
                </form>
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
                <p class="font-bold">Puntuación Promedio:</p>
                <p>{{ data_get($book, 'average_rating') }}</p>
            </div>
        </div>
        {{-- Footer section --}}
        <div>

        </div>
    </div>
</x-app-layout>
