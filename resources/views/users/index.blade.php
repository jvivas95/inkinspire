<x-app-layout>
    <x-slot name="title">
        Explorar lectores - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    @php
        $searchTerm = trim((string) request('q'));
    @endphp

    <div class="mx-auto max-w-5xl space-y-6">
        <section class="rounded-[28px] border border-[#E8E2D3] bg-white/80 p-6 shadow-[0_20px_60px_rgba(6,78,59,0.08)] backdrop-blur">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-2xl">
                    <p class="mb-2 text-sm font-semibold uppercase tracking-[0.28em] text-[#D4AF37]">
                        Explorar comunidad
                    </p>
                    <h1 class="text-3xl font-semibold text-[#0F172A] sm:text-4xl">
                        Descubre lectores que comparten tu pasión
                    </h1>
                    <p class="mt-3 text-sm leading-6 text-slate-600 sm:text-base">
                        Encuentra perfiles inspiradores, descubre nuevas voces y sigue a quienes te hacen querer abrir otro libro.
                    </p>
                </div>

                <form action="{{ route('users.index') }}" method="GET" class="w-full max-w-xl">
                    <label for="user-search" class="sr-only">Buscar usuarios</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 3.5a7.5 7.5 0 0013.15 13.15z" />
                            </svg>
                        </span>
                        <input id="user-search" type="text" name="q" value="{{ $searchTerm }}" placeholder="Buscar por nombre o username..." class="w-full rounded-full border border-[#E2E8F0] bg-[#FDFCF8] py-3 pl-12 pr-28 text-sm text-[#0F172A] shadow-sm transition focus:border-[#D4AF37] focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/20">
                        <button type="submit" class="absolute inset-y-1 right-1 rounded-full bg-[#064E3B] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#0A4D3A]">
                            Buscar
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <section class="rounded-[24px] border border-[#E8E2D3] bg-white/80 p-4 shadow-[0_16px_45px_rgba(15,23,42,0.05)] sm:p-6">
            @if($users->isNotEmpty())
                <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-[#0F172A]">
                            {{ $searchTerm ? 'Resultados para "' . $searchTerm . '"' : 'Lectores destacados' }}
                        </h2>
                        <p class="text-sm text-slate-500">
                            {{ $searchTerm ? 'Encuentra perfiles cercanos a tu estilo de lectura' : 'Descubre perfiles para seguir y compartir recomendaciones' }}
                        </p>
                    </div>
                    <span class="inline-flex w-fit rounded-full bg-[#FEF8E8] px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#D4AF37]">
                        {{ $users->count() }} perfiles
                    </span>
                </div>

                <div class="grid gap-3 md:grid-cols-2">
                    @foreach($users as $user)
                        <a href="{{ route('profile.show', $user->username) }}"
                           class="group flex items-center justify-between rounded-2xl border border-[#F2E9D8] bg-[#FCFBF7] p-4 transition-all duration-300 hover:-translate-y-1 hover:border-[#D4AF37]/40 hover:shadow-[0_16px_40px_rgba(6,78,59,0.10)]">
                            <div class="flex min-w-0 items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#FFF6D7] p-[2px] shadow-sm">
                                    <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/default_avatar.png') }}"
                                         alt="{{ $user->name }}"
                                         class="h-full w-full rounded-full object-cover"
                                         onerror="if (this.src != '{{ asset('images/default_avatar.png') }}') { this.src = '{{ asset('images/default_avatar.png') }}'; }">
                                </div>

                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="truncate font-semibold text-[#0F172A]">{{ $user->username }}</span>
                                        <span class="rounded-full bg-[#F3F4F6] px-2 py-0.5 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#64748B]">
                                            lector
                                        </span>
                                    </div>
                                    <p class="truncate text-sm text-slate-500">{{ $user->name }}</p>
                                </div>
                            </div>

                            <div class="ml-3 flex items-center gap-2 text-sm font-semibold text-[#064E3B] transition group-hover:translate-x-1">
                                <span class="hidden sm:inline">Ver perfil</span>
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H4" />
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-[#D4AF37]/40 bg-[#FFFDF8] px-6 py-12 text-center">
                    <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#FEF8E8]">
                        <svg class="h-7 w-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 3.5a7.5 7.5 0 0013.15 13.15z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-[#0F172A]">
                        {{ $searchTerm ? 'No encontramos perfiles con esa búsqueda' : 'Todavía no hay perfiles para explorar' }}
                    </h3>
                    <p class="mt-2 max-w-md text-sm text-slate-500">
                        {{ $searchTerm ? 'Prueba con otro término o vuelve a explorar la comunidad para descubrir nuevas lecturas.' : 'Súbete a la comunidad y comparte tu primera reseña para aparecer aquí.' }}
                    </p>
                    <a href="{{ route('users.index') }}" class="mt-5 rounded-full bg-[#064E3B] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#0A4D3A]">
                        Ver todos los perfiles
                    </a>
                </div>
            @endif
        </section>
    </div>
</x-app-layout>
