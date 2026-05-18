<x-guest-layout>
    <x-slot name="title">
        Login - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <style>
        :root {
            --ink-bg: #FDFCF8;
            --ink-dark: #064E3B;
            --ink-header: #0F172A;
            --ink-gold: #D4AF37;
            --ink-muted: #64748B;
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div style="margin-bottom: 2rem; text-align: center;">
        <p style="font-family: 'Playfair Display', serif; font-size: 1.875rem; font-weight: 700; color: var(--ink-header); margin: 0;">Bienvenido de vuelta</p>
        <p style="color: var(--ink-muted); margin-top: 0.5rem; font-size: 0.875rem;">Inicia sesión para continuar</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-2 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-5">
            <label for="remember_me" class="inline-flex items-center" style="cursor: pointer;">
                <input id="remember_me" type="checkbox" class="rounded" style="border: 1.5px solid #E2E8F0; accent-color: var(--ink-dark); width: 1rem; height: 1rem; cursor: pointer;" name="remember">
                <span class="ms-3 text-sm" style="color: var(--ink-muted);">{{ __('Recuérdame') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a style="color: var(--ink-dark); font-size: 0.875rem; text-decoration: none; font-weight: 500; transition: color 0.2s;" href="{{ route('password.request') }}" onmouseover="this.style.color='var(--ink-gold)';" onmouseout="this.style.color='var(--ink-dark)';">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @else
                <div></div>
            @endif

            <x-primary-button>
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>

        <!-- Signup Link -->
        <div class="mt-6 text-center">
            <p style="color: var(--ink-muted); font-size: 0.875rem;">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" style="color: var(--ink-dark); font-weight: 600; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--ink-gold)';" onmouseout="this.style.color='var(--ink-dark)';">
                    Registrarse
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
