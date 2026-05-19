@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 text-sm font-medium leading-5 text-[#D4AF37] underline decoration-2 underline-offset-8 focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 text-sm font-medium leading-5 text-[#064E3B] hover:text-[#D4AF37] no-underline hover:underline hover:decoration-2 hover:underline-offset-8 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
