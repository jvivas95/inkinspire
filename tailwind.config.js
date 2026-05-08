import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
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
