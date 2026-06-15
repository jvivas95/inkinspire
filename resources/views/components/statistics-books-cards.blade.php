{{-- Esto avisa a Laravel que variables va a recibir el componente desde fuera --}}
@props(['read', 'wantToRead', 'reading'])

{{-- Statistics cards --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Reading container --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
            <p>Leyendo actualmente</p>
        </div>
        {{-- List of books currently reading --}}
        <div class="flex flex-col gap-4">
            @foreach ($reading as $entry)
                <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                    <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                        {{ $entry->book->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Want to Read container --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
            <p>Quiero Leer</p>
        </div>
        {{-- List of books in want to read list --}}
        <div class="flex flex-col gap-4">
            @foreach ($wantToRead as $entry)
            <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                    {{ $entry->book->title }}
                </a>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Read container --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
            <p>Leídos</p>
        </div>
        {{-- List of books in read list --}}
        <div class="flex flex-col gap-4">
            @foreach ($read as $entry)
                <div class="bg-gray-100 p-4 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-2">
                    <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                        {{ $entry->book->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>




</div>
