@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-md shadow-sm', 'style' => 'border: 1.5px solid #E2E8F0; background-color: white; color: var(--ink-header); padding: 0.75rem 1rem; font-size: 0.875rem; width: 100%; transition: border-color 0.2s, box-shadow 0.2s;']) }} onfocus="this.style.borderColor='var(--ink-gold)'; this.style.boxShadow='0 0 0 3px rgba(212, 175, 55, 0.1)';" onfocusout="this.style.borderColor='#E2E8F0'; this.style.boxShadow='0 1px 2px 0 rgba(0, 0, 0, 0.05)';">
