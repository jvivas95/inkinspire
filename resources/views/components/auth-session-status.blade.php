@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm p-3 rounded-lg', 'style' => 'background-color: rgba(6, 78, 59, 0.05); color: var(--ink-dark); border: 1px solid rgba(6, 78, 59, 0.2);']) }}>
        {{ $status }}
    </div>
@endif
