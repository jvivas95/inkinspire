<x-app-layout>
    <x-slot name="title">
        {{ $publicUser->name }} - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center space-x-6">
                <img src="{{ Storage::url($publicUser->avatar ?? 'images/default-avatar.png') }}" alt="{{ $publicUser->name }}'s Profile Picture" class="w-24 h-24 sm:w-36 sm:h-36 rounded-full object-cover">

                <div class="flex-1">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-2xl font-semibold">{{ $publicUser->username }}</h2>

                        @if(auth()->check() && auth()->user()->id === $publicUser->id)
                            <a href="{{ url('/profile/edit') }}" class="px-4 py-1 border rounded text-sm">Editar perfil</a>
                        @else

                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded text-sm">Seguir</button>
                        @endif
                    </div>

                    <div class="mt-4 flex space-x-6 text-sm">
                        {{-- <div><span class="font-semibold">{{ optional($reviewsGuestUser)->count() ?? 0 }}</span> comentarios</div> --}}
                        <div><span class="font-semibold">{{ optional($publicUser->followers)->count() ?? 0 }}</span> seguidores</div>
                        <div><span class="font-semibold">{{ optional($publicUser->following)->count() ?? 0 }}</span> seguidos</div>
                    </div>

                    <div class="mt-4">
                        <p class="font-medium">{{ $publicUser->name }}</p>
                        @if(!empty($publicUser->bio))
                            <p class="text-sm text-gray-600">{{ $publicUser->bio }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-6 space-y-6">
            {{-- @php
                $books = $publicUser->books ?? collect();
            @endphp

            @if($books->count())
                <div class="grid grid-cols-3 gap-1">
                    @foreach($books as $book)
                        <a href="{{ url('books/'.$book->id) }}" class="block">
                            <img src="{{ Storage::url($book->cover ?? 'images/book-placeholder.png') }}" alt="{{ $book->title ?? 'Book' }}" class="w-full h-40 object-cover">
                        </a>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">
                    Este usuario no ha publicado nada todavía.
                </div>
            @endif --}}

            {{-- Statistics component --}}
            <x-statistics-books
                :read="$read"
                :want-to-read="$wantToRead"
                :reading="$reading"
            />

            {{-- Statistics cards --}}
            <x-statistics-books-cards
                :read="$read"
                :want-to-read="$wantToRead"
                :reading="$reading"
            />

            {{-- Favorite Books container --}}
            <x-favorite-books :favorite-books="$favoriteBooks" />

        </div>
    </div>
</x-app-layout>
