{{-- Esto avisa a Laravel que variables va a recibir el componente desde fuera --}}
@props(['read', 'wantToRead', 'reading'])

{{-- Statistics cards --}}
<div class="flex flex-col gap-6">

    {{-- Reading container --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
            <p>Leyendo actualmente</p>
        </div>
        {{-- List of books currently reading --}}
        <div class="flex flex-col gap-4">
            @if ($reading->isEmpty())
                <p class="text-gray-500 text-sm text-center py-4">Aún no se han añadido librosa a lista "Leyendo actualmente".</p>
            @else
                @foreach ($reading as $entry)
                    <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-between gap-2">
                        <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                            {{ $entry->book->title }}
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- Want to Read container --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
            <p>Quiero Leer</p>
        </div>
        {{-- List of books in want to read list --}}
        <div class="flex flex-col gap-4">
            @if ($wantToRead->isEmpty())
                <p class="text-gray-500 text-sm text-center py-4">Aún no se han añadido librosa a lista "Quiero Leer".</p>
            @else
                @foreach ($wantToRead as $entry)
                <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-between gap-2">
                    <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                        {{ $entry->book->title }}
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- Read container --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
            <p>Leídos</p>
        </div>
        {{-- List of books in read list --}}
        <div class="flex flex-col gap-4">
            @if ($read->isEmpty())
                <p class="text-gray-500 text-sm text-center py-4">Aún no se han añadido librosa a lista "Leídos".</p>
            @else
                @foreach ($read as $entry)
                    <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-between gap-2">
                        <a href="{{ route('books.show', $entry->book->id) }}" class="text-sm md:text-base flex-1 text-left text-black hover:text-[#D4AF37]">
                            {{ $entry->book->title }}
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
