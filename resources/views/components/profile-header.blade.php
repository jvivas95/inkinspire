<div class="bg-white rounded-lg shadow p-6 mb-6">
    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">

        {{-- Avatar --}}
        <div class="flex-shrink-0">
            <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/default_avatar.png') }}"
                alt="{{ $user->name }}"
                class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-[#064E3B]"
                onerror="if (this.src != '{{ asset('images/default_avatar.png') }}') { this.src = '{{ asset('images/default_avatar.png') }}'; }"
                >
        </div>

        {{-- Info --}}
        <div class="flex-1 text-center sm:text-left">
            <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-3">
                <h2 class="text-2xl font-bold text-[#064E3B]">{{ $user->username }}</h2>

                @if($isOwner)
                    <a href="{{ route('profile.edit') }}"
                       class="px-4 py-1.5 border border-[#064E3B] text-[#064E3B] rounded-lg text-sm font-medium hover:bg-[#064E3B] hover:text-white transition">
                        Editar perfil
                    </a>
                @else
                    <form method="POST" action="{{ route('users.follow', $user) }}">
                        @csrf
                        <button type="submit"
                            class="{{ $isFollowing ? 'bg-gray-200 text-gray-700 hover:bg-red-100 hover:text-red-600' : 'bg-[#064E3B] text-white hover:bg-[#D4AF37]' }} px-4 py-1.5 rounded-lg text-sm font-medium transition">
                            {{ $isFollowing ? 'Dejar de seguir' : 'Seguir' }}
                        </button>
                    </form>
                @endif
            </div>

            {{-- Seguidores --}}
            <div class="flex justify-center sm:justify-start gap-6 text-sm mb-4">
                <div class="text-center">
                    <span class="font-bold text-[#064E3B] text-lg">{{ $user->followers->count() }}</span>
                    <p class="text-[#64748B]">seguidores</p>
                </div>
                <div class="text-center">
                    <span class="font-bold text-[#064E3B] text-lg">{{ $user->following->count() }}</span>
                    <p class="text-[#64748B]">seguidos</p>
                </div>
                <div class="text-center">
                    <span class="font-bold text-[#064E3B] text-lg">{{ $user->reviews->count() }}</span>
                    <p class="text-[#64748B]">reseñas</p>
                </div>
            </div>

            {{-- Nombre y bio --}}
            <p class="font-semibold text-[#064E3B]">{{ $user->name }}</p>
            @if($user->bio)
                <p class="text-sm text-[#64748B] mt-1">{{ $user->bio }}</p>
            @endif
        </div>
    </div>

    {{-- Stats de lectura --}}
    <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-100">
        <div class="text-center">
            <p class="text-2xl font-bold text-[#D4AF37]">{{ $readingCount }}</p>
            <p class="text-xs text-[#64748B] mt-1">Leyendo</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-[#064E3B]">{{ $wantToReadCount }}</p>
            <p class="text-xs text-[#64748B] mt-1">Por leer</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-[#064E3B]">{{ $readCount }}</p>
            <p class="text-xs text-[#64748B] mt-1">Leídos</p>
        </div>
    </div>
</div>
