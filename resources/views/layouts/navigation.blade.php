<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b bg-white border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center w-full sm:w-auto justify-center sm:justify-start">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logov3.png') }}" alt="InkInspire Logo" class="h-16 w-auto pt-2 pb-1">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Perfil') }}
                    </x-nav-link>
                    <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.index')">
                        {{ __('Libros') }}
                    </x-nav-link>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                        {{ __('Explorar') }}
                    </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center gap-2">
                @auth
                {{-- Notifications bell --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="relative p-2 text-gray-300 hover:text-[#D4AF37] transition">
                        {{-- SVG icon bell --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>

                        {{-- Unread count --}}
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold">
                                {{ auth()->user()->unreadNotifications->count() > 9 ? '9+' : auth()->user()->unreadNotifications->count() }}
                            </span>
                        @endif
                    </button>

                    {{-- Dropdown notifications --}}
                    <div x-show="open"
                        @click.away="open = false"
                        x-transition
                        class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50 overflow-hidden">

                        <div class="px-4 py-3 border-b flex justify-between items-center">
                            <p class="font-semibold text-[#0F172A] text-sm">Notificaciones</p>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <a href="{{ route('notifications.markAllRead') }}"
                                class="text-xs text-[#064E3B] hover:text-[#D4AF37] transition">
                                    Marcar todas como leídas
                                </a>
                            @endif
                        </div>

                        <div class="max-h-80 overflow-y-auto">
                            @forelse(auth()->user()->notifications->take(5) as $notification)
                                <a href="{{ route('notifications.read', $notification->id) }}"
                                class="flex items-start gap-3 px-4 py-3 hover:bg-[#F1F5F9] transition {{ $notification->read_at ? 'opacity-60' : 'bg-blue-50' }}">
                                    <div class="flex-shrink-0 w-2 h-2 rounded-full mt-2 {{ $notification->read_at ? 'bg-gray-300' : 'bg-[#064E3B]' }}"></div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm text-[#0F172A] leading-snug">{{ $notification->data['message'] }}</p>
                                        <p class="text-xs text-[#64748B] mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                </a>
                            @empty
                                <div class="px-4 py-8 text-center">
                                    <p class="text-sm text-[#64748B]">No tienes notificaciones</p>
                                </div>
                            @endforelse
                        </div>

                        @if(auth()->user()->notifications->count() > 0)
                            <div class="px-4 py-3 border-t text-center">
                                <a href="{{ route('notifications.index') }}"
                                class="text-sm text-[#064E3B] hover:text-[#D4AF37] transition font-medium">
                                    Ver todas las notificaciones
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center">
                    <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('images/default_avatar.png') }}"
                        alt="{{ Auth::user()->name }}"
                        class="w-10 h-10 rounded-full mb-2"
                        onerror="if (this.src != '{{ asset('images/default_avatar.png') }}') { this.src = '{{ asset('images/default_avatar.png') }}'; }"
                    >
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-emerald-800 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->username }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                @endauth

                {{-- Auth buttons --}}
                @guest
                <div class="inline-flex items-center">
                    <a href="{{ route('login') }}"
                        style="color: var(--ink-dark); font-size: 0.9rem; font-weight: 500;"
                        class="hover:text-white transition px-3 py-2">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        style="background: var(--ink-dark); color: white; font-size: 0.9rem; font-weight: 600;"
                        class="px-5 py-2 rounded-lg hover:opacity-90 transition">
                        Registro
                    </a>
                </div>
                @endguest
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    @auth
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Perfil') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('books.index')" :active="request()->routeIs('books.index')">
                {{ __('Libros') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                {{ __('Explorar') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }} - {{ Auth::user()->username }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth
</nav>
