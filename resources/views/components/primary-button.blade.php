<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 bg-opacity-100 border border-transparent rounded-lg font-semibold text-sm text-white tracking-wide transition ease-in-out duration-150', 'style' => 'background-color: var(--ink-dark); cursor: pointer;']) }} onmouseover="this.style.backgroundColor='#053D2E';" onmouseout="this.style.backgroundColor='var(--ink-dark)';" onfocus="this.style.outline='2px solid var(--ink-gold)'; this.style.outlineOffset='2px';" onblur="this.style.outline='none';">
    {{ $slot }}
</button>
