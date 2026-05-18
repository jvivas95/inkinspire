import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    safelist: [
        'rounded-lg',
        'px-8', 'px-6', 'px-5', 'px-3',
        'py-3.5', 'py-3', 'py-2.5', 'py-2',
        'gap-4', 'gap-6', 'gap-8', 'gap-3',
        'flex', 'flex-col', 'flex-row',
        'items-center', 'justify-center', 'justify-between',
        'text-sm', 'text-xs', 'text-base', 'text-lg',
        'font-semibold', 'font-bold', 'font-medium',
        'hidden', 'md:flex', 'md:grid-cols-3', 'md:grid-cols-4',
        'grid', 'grid-cols-1', 'grid-cols-2',
        'w-full', 'h-16', 'h-10',
        'mt-2', 'mt-3', 'mt-4', 'mb-2', 'mb-3', 'mb-4', 'mb-6',
        'max-w-7xl', 'max-w-5xl',
        'mx-auto', 'overflow-hidden',
        'transition', 'hover:opacity-90',
        'leading-tight', 'leading-relaxed',
        'tracking-widest', 'uppercase',
        'line-clamp-3',
        'border-t', 'border-b',
        'space-y-2', 'space-y-4',
        'col-span-2',
        'min-w-0', 'flex-shrink-0', 'flex-1',
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                playfair: ['"Playfair Display"', 'serif'],
                inter: ['Inter', 'sans-serif'],
            },
            colors: {
            'ink-bg': '#FDFCF8',
            'ink-dark': '#064E3B',
            'ink-header': '#0F172A',
            'ink-gold': '#D4AF37',
            'ink-muted': '#64748B',
            'ink-card': '#F1F5F9',
        }
        },
    },

    plugins: [forms],
};
