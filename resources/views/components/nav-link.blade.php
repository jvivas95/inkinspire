@props(['active'])

@php
$classes = ($active ?? false)
            // ESTADO ACTIVO: Texto verde oscuro y borde inferior marcado
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-emerald-600 text-sm font-bold leading-5 text-emerald-900 focus:outline-none focus:border-emerald-700 transition duration-150 ease-in-out'
            // ESTADO INACTIVO: Texto grisáceo que se vuelve verde al pasar el mouse
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-slate-500 hover:text-emerald-700 hover:border-emerald-300 focus:outline-none focus:text-emerald-800 focus:border-emerald-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
