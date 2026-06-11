<x-app-layout>
    <x-slot name="title">
        {{ $publicUser->name }}'s Profile - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">{{ $publicUser->name }}'s Profile</h1>
            <p><strong>Username:</strong> {{ $publicUser->username }}</p>
            <p><strong>Email:</strong> {{ $publicUser->email }}</p>
            <p><strong>Joined:</strong> {{ $publicUser->created_at->format('F j, Y') }}</p>
        </div>
    </div>
</x-app-layout>
