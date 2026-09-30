<footer class="bg-[#0F172A] text-[#94a3b8]">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
            <div class="col-span-2 md:col-span-1">
                <p class="font-playfair text-xl font-bold text-white mb-3">InkInspire</p>
                <p class="text-sm leading-relaxed" style="color: #94a3b8;">
                    La plataforma definitiva para los amantes de las letras, donde cada página es un nuevo comienzo.
                </p>
            </div>
            @guest
                <div>
                    <p class="text-xs font-semibold tracking-widest uppercase mb-4 text-white">Comunidad</p>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('register') }}" class="hover:text-white transition">Únete</a></li>
                        <li><a href="{{ route('home') }}#resenas" class="hover:text-white transition">Reseñas</a></li>
                        <li><a href="{{ route('home') }}#libros" class="hover:text-white transition">Explorar libros</a></li>
                    </ul>
                </div>
            @endguest
            <div>
                <p class="text-xs font-semibold tracking-widest uppercase mb-4 text-white">Soporte</p>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('help')}}" class="hover:text-white transition">Centro de Ayuda</a></li>
                    <li><a href="{{ route('contact')}}" class="hover:text-white transition">Contacto</a></li>
                    <li><a href="{{ route('faq')}}" class="hover:text-white transition">FAQ</a></li>
                </ul>
            </div>
            <div>
                <p class="text-xs font-semibold tracking-widest uppercase mb-4 text-white">Legal</p>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition">Términos y Condiciones</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:text-white transition">Privacidad</a></li>
                    <li><a href="{{ route('cookies') }}" class="hover:text-white transition">Cookies</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t pt-6 flex flex-col md:flex-row items-center justify-between gap-3" style="border-color: rgba(255,255,255,0.1);">
            <p class="text-xs">© {{ date('Y') }} InkInspire. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
