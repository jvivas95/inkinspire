{{-- Esto avisa a Laravel que variables va a recibir el componente desde fuera --}}
@props(['read', 'wantToRead', 'reading'])


{{-- Statistics container --}}
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4 border-b pb-2 text-xl font-semibold text-center">
        <p class="text-[#064E3B]">Estadísticas</p>
    </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-center">
        <div class="bg-gray-100 p-4 rounded-lg">
            <p class="truncate text-sm md:text-base">En Lectura</p>
            <p class="text-lg font-semibold">{{ $reading->count() }}</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg">
            <p class="truncate text-sm md:text-base">Quiero Leer</p>
            <p class="text-lg font-semibold">{{ $wantToRead->count() }}</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg">
            <p class="truncate text-sm md:text-base">Leídos</p>
            <p class="text-lg font-semibold">{{ $read->count() }}</p>
        </div>
    </div>
</div>
