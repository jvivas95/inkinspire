{{-- Esto avisa a Laravel que variables va a recibir el componente desde fuera --}}
@props(['favoriteBooks'])

{{-- Favorite Books container --}}
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-6 border-b pb-2 text-xl font-semibold text-center">
        <p class="text-[#064E3B]">Mis libros favoritos</p>
    </div>

    @if($favoriteBooks->isEmpty())
        <p class="text-gray-500 text-sm text-center py-4">Aún no tienes libros en tus favoritos.</p>
    @else
        <div class="favorites-carousel flex gap-6 overflow-x-auto pb-4 scroll-smooth" style="-webkit-overflow-scrolling: touch; scrollbar-width: none;">
            @foreach ($favoriteBooks as $favorite)
            <div class="bg-[#064E3B] p-3 rounded-md">
                <a href="{{ route('books.show', $favorite->book->id) }}"
                class="flex-shrink-0 w-36 flex flex-col items-center group">
                    @if($favorite->book->cover_image)
                        <img src="{{ $favorite->book->cover_image ?? asset('images/default-book.png')}}"
                            alt="{{ $favorite->book->title }}"
                            class="w-36 h-52 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow duration-100"
                            onerror="if (this.src != '{{ asset('images/default-book.png') }}') { this.src = '{{ asset('images/default-book.png') }}'; }">
                    @else
                        <div class="w-36 h-52 rounded-lg shadow-md flex items-center justify-center p-3 text-center"
                            style="background: #064E3B;">
                            <span class="text-xs font-bold text-white line-clamp-4">{{ $favorite->book->title }}</span>
                        </div>
                    @endif
                    <p class="text-xs mt-2 text-center line-clamp-2 pb-1 text-white group-hover:text-[#D4AF37] transition-colors">
                        {{ $favorite->book->title }}
                    </p>
                    <p class="text-xs text-gray-400 truncate w-full text-center">{{ $favorite->book->author }}</p>
                </a>
            </div>
            @endforeach
        </div>
    @endif
</div>
