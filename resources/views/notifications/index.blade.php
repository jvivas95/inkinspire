<x-app-layout>
    <x-slot name="title">Notificaciones - {{ config('app.name', 'InkInspire') }}</x-slot>

    <div class="max-w-2xl mx-auto py-8 px-4">
        <div class="bg-white rounded-lg shadow overflow-hidden">

            {{-- Header --}}
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h2 class="text-xl font-bold text-[#064E3B]">Notificaciones</h2>
                @if(auth()->user()->unreadNotifications->count() > 0)
                    <a href="{{ route('notifications.markAllRead') }}"
                       class="text-xs text-[#64748B] hover:text-[#064E3B] transition">
                        Marcar todas como leídas
                    </a>
                @endif
            </div>

            {{-- Lista de notificaciones --}}
            @forelse($notifications as $notification)
                <a href="{{ route('notifications.read', $notification->id) }}"
                   class="flex items-center gap-4 px-6 py-4 border-b hover:bg-[#F1F5F9] transition {{ $notification->read_at ? '' : 'bg-blue-50' }}">

                    {{-- Avatar del usuario que generó la notificación --}}
                    @php
                        $senderId = $notification->data['liker_id'] ?? $notification->data['follower_id'] ?? null;
                        $sender = $senderId ? \App\Models\User::find($senderId) : null;
                    @endphp

                    @if($sender)
                        <img src="{{ Storage::url($sender->avatar ?? 'images/default-avatar.png') }}"
                             alt="{{ $sender->name }}"
                             class="w-12 h-12 rounded-full object-cover flex-shrink-0">
                    @else
                        <div class="w-12 h-12 rounded-full bg-[#064E3B] flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">?</span>
                        </div>
                    @endif

                    {{-- Contenido --}}
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-[#0F172A] leading-snug">
                            {{ $notification->data['message'] }}
                        </p>
                        <p class="text-xs text-[#64748B] mt-1">
                            {{ $notification->created_at->diffForHumans() }}
                        </p>
                    </div>

                    {{-- Indicador de no leída --}}
                    @if(!$notification->read_at)
                        <div class="w-2.5 h-2.5 rounded-full bg-[#064E3B] flex-shrink-0"></div>
                    @endif
                </a>
            @empty
                <div class="px-6 py-16 text-center">
                    <p class="text-4xl mb-4">🔔</p>
                    <p class="text-[#0F172A] font-semibold">Sin notificaciones</p>
                    <p class="text-sm text-[#64748B] mt-1">Cuando alguien interactúe contigo aparecerá aquí.</p>
                </div>
            @endforelse

            {{-- Paginación --}}
            @if($notifications->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $notifications->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
