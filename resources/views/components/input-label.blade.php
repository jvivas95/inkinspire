@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm', 'style' => 'color: var(--ink-header);']) }}>
    {{ $value ?? $slot }}
</label>
