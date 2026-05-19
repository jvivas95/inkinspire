<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 border border-transparent rounded-lg font-semibold text-sm text-white tracking-wide transition ease-in-out duration-150', 'style' => 'background-color: #064E3B; cursor: pointer;']) }} onmouseover="this.style.backgroundColor='#0A6B52';" onmouseout="this.style.backgroundColor='#064E3B';" onfocus="this.style.outline='2px solid var(--ink-gold)'; this.style.outlineOffset='2px';" onblur="this.style.outline='none';">
    {{ $slot }}
</button>
