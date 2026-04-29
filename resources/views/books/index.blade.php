<x-app-layout>
    <form method="GET" action="{{ route('books.index') }}">
        <div>
            <x-input-label for="search" :value="__('Search')" />
            <x-text-input id="search" class="block mt-1 w-full" type="text" name="q" :value="request('q')" autocomplete="off" />
            <x-input-error :messages="$errors->get('q')" class="mt-2" />
        </div>
    </form>
    <div class="mt-4">
        @foreach ($books as $book)
            <div class="border p-4 mb-4">
                <img src="{{ data_get($book, 'cover_image') }}" alt="{{ data_get($book, 'title') }} cover" class="w-32 h-auto mb-2">
                <h2 class="text-xl font-bold">{{ data_get($book, 'title') }}</h2>
                <p>{{ data_get($book, 'author') }}</p>

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
