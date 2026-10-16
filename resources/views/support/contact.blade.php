<x-app-layout>
    <x-slot name="title">
        Contacto - {{ config('app.name', 'InkInspire') }}
    </x-slot>
    <div>
        <form method="POST" action="{{ route('contact.send') }}">
            @csrf
            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-4 rounded bg-red-100 px-4 py-3 text-red-800">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="hidden" aria-hidden="true">
                <input type="hidden" name="website" tabindex="-1" autoComplete="off">
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                <input type="text" name="name" id="name" required class="w-full border border-gray-300 rounded px-3 py-2">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
                <label for="email" class="block text-gray-700 font-bold mb-2 mt-4">Correo Electrónico:</label>
                <input type="email" name="email" id="email" required class="w-full border border-gray-300 rounded px-3 py-2">
                <label for="reason" class="block text-gray-700 font-bold mb-2 mt-4">Motivo:</label>
                <select name="reason" id="reason" required class="w-full border border-gray-500 rounded px-3 py-2">
                    <option value="">-- Seleccione una opción --</option>
                    <option value="doubt">Duda sobre la plataforma</option>
                    <option value="tech_problem">Problema Técnico</option>
                    <option value="suggestion">Sugerencias</option>
                    <option value="report_content">Denunciar contenido</option>
                    <option value="privacy_policy">Datos personales y privacidad</option>
                    <option value="other">Otros</option>
                </select>
                <label for="message" class="block text-gray-700 font-bold mb-2 mt-4">Mensaje:</label>
                <textarea name="message" id="message" required class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
                <label for="privacy_policy" class="block text-gray-700 font-bold mb-2 mt-4">
                    <input type="checkbox" name="privacy_policy" id="privacy_policy" required class="mr-2">
                        <span class="text-gray-700">
                            Acepto la <a href="{{ route('privacy') }}" target="_blank" class="text-blue-500 hover:underline">política de privacidad</a>
                        </span>
                </label>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
            </div>
        </form>
    </div>
</x-app-layout>
