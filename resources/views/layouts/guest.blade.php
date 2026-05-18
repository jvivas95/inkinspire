@props(['title' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'InkInspire') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root {
                --ink-bg: #FDFCF8;
                --ink-dark: #064E3B;
                --ink-header: #0F172A;
                --ink-gold: #D4AF37;
                --ink-muted: #64748B;
                --ink-card: #F1F5F9;
            }
        </style>
    </head>
    <body style="font-family: 'Inter', sans-serif; background: linear-gradient(135deg, var(--ink-bg) 0%, #F1EFE7 100%); color: var(--ink-header);">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-8">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/final_logo.png') }}" alt="InkInspire" style="height: 150px; width: auto;">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-lg overflow-hidden sm:rounded-lg" style="border: 1px solid rgba(212, 175, 55, 0.1); box-shadow: 0 4px 20px rgba(6, 78, 59, 0.06);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
