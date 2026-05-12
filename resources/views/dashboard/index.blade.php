<x-app-layout>
    <x-slot name="title">
        Dashboard - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    {{-- Principal container --}}
    <div class="container mx-auto px-4 py-6">
        {{-- Statistics Dashboard --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
                <p>Estadísticas</p>
            </div>
            {{-- Container reading, want_to_read, read --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-center">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p>Leídos</p>
                    <p>{{ $read->count() }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p>Quiero Leer</p>
                    <p>{{ $wantToRead->count() }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p>En Lectura</p>
                    <p>{{ $reading->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
