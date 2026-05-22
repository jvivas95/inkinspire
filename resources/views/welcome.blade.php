<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InkInspire — Donde los Lectores se Encuentran</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
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
        body { font-family: 'Inter', sans-serif; background: var(--ink-bg); }
        .font-playfair { font-family: 'Playfair Display', serif; }

        /* Hero */
        .hero-section {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .hero-bg {
            position: absolute;
            inset: 0;
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=1600&q=80');
            background-size: cover;
            background-position: center;
            filter: brightness(0.35);
        }
        .hero-content { position: relative; z-index: 10; text-align: center; padding: 2rem; max-width: 700px; }

        /* Cards */
        .review-card {
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 1px solid #e8e8e8;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .review-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.1); }

        /* Book cards */
        .book-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .book-card:hover { transform: translateY(-6px); }
        .book-cover {
            width: 120px;
            height: 175px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 4px 4px 16px rgba(0,0,0,0.2);
        }

        /* CTA Banner */
        .cta-banner {
            background: linear-gradient(135deg, var(--ink-dark) 0%, #0a7c5c 100%);
            border-radius: 16px;
            padding: 3rem 2rem;
        }

        /* Stars */
        .stars { color: var(--ink-gold); font-size: 0.85rem; }

        /* Navbar */
        .nav-link {
            color: var(--ink-dark);
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0;
            border-bottom: 2px solid transparent;
            transition: color 0.2s, border-color 0.2s;
            text-decoration: none;
        }
        .nav-link:hover { color: var(--ink-gold); border-color: var(--ink-gold); }
        .nav-link.active,
        .nav-link[aria-current="page"] {
            color: var(--ink-gold);
            border-color: var(--ink-gold);
        }

        /* Activity */
        .activity-dot {
            width: 36px; height: 36px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.75rem; font-weight: 700; color: white; flex-shrink: 0;
        }

        /* Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.8s ease forwards; }
        .fade-up-delay-1 { animation: fadeUp 0.8s ease 0.2s forwards; opacity: 0; }
        .fade-up-delay-2 { animation: fadeUp 0.8s ease 0.4s forwards; opacity: 0; }
        .fade-up-delay-3 { animation: fadeUp 0.8s ease 0.6s forwards; opacity: 0; }

        /* Scrollbar */
        .books-scroll { overflow-x: auto; scrollbar-width: none; }
        .books-scroll::-webkit-scrollbar { display: none; }
    </style>
</head>
<body>

    {{-- ═══════════════════════════════════════════════════════════
         NAVBAR
    ═══════════════════════════════════════════════════════════ --}}
    @include('layouts.navigation')

    {{-- ═══════════════════════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════════════════════ --}}
    <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <p class="fade-up mb-4 text-sm font-semibold tracking-widest uppercase" style="color: var(--ink-gold);">
                La comunidad literaria que estabas buscando
            </p>
            <h1 class="font-playfair fade-up-delay-1 text-4xl md:text-6xl font-black text-white leading-tight mb-6">
                InkInspire: Donde los<br>Lectores se Encuentran
            </h1>
            <p class="fade-up-delay-2 text-lg mb-10" style="color: #cbd5e1; max-width: 520px; margin: 0 auto 2.5rem;">
                Únete a la mayor red social literaria y descubre tu próxima gran historia en un espacio diseñado para la inspiración.
            </p>
            <div class="fade-up-delay-3 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}"
                   style="background: var(--ink-dark); color: white; font-weight: 600;"
                   class="px-8 py-3.5 rounded-lg text-base hover:opacity-90 transition">
                    Empezar Gratis
                </a>
                <a href="#como-funciona"
                   style="border: 2px solid rgba(255,255,255,0.4); color: white; font-weight: 500;"
                   class="px-8 py-3.5 rounded-lg text-base hover:bg-white hover:text-gray-900 transition">
                    Aprender Más
                </a>
            </div>

            {{-- Stats --}}
            <div class="mt-16 flex justify-center gap-12">
                <div class="text-center">
                    <p class="font-playfair text-3xl font-bold text-white">{{ $totalBooks }}+</p>
                    <p class="text-sm" style="color: #94a3b8;">Libros</p>
                </div>
                <div class="text-center">
                    <p class="font-playfair text-3xl font-bold text-white">{{ $totalReviews }}+</p>
                    <p class="text-sm" style="color: #94a3b8;">Reseñas</p>
                </div>
                <div class="text-center">
                    <p class="font-playfair text-3xl font-bold text-white">{{ $totalUsers }}+</p>
                    <p class="text-sm" style="color: #94a3b8;">Lectores</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════
         CÓMO FUNCIONA
    ═══════════════════════════════════════════════════════════ --}}
    <section id="como-funciona" class="py-16 px-4" style="background: var(--ink-bg);">
        <div class="max-w-5xl mx-auto text-center">
            <p class="text-sm font-semibold tracking-widest uppercase mb-2" style="color: var(--ink-gold);">Simple y rápido</p>
            <h2 class="font-playfair text-3xl font-bold mb-12" style="color: var(--ink-header);">
                ¿Cómo funciona InkInspire?
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-4"
                         style="background: var(--ink-dark); color: var(--ink-gold);">
                        📚
                    </div>
                    <h3 class="font-playfair text-lg font-bold mb-2" style="color: var(--ink-header);">1. Descubre libros</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--ink-muted);">
                        Busca entre miles de libros usando nuestra integración con Google Books y encuentra tu próxima lectura.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-4"
                         style="background: var(--ink-dark); color: var(--ink-gold);">
                        ✍️
                    </div>
                    <h3 class="font-playfair text-lg font-bold mb-2" style="color: var(--ink-header);">2. Escribe tu reseña</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--ink-muted);">
                        Comparte tu opinión con la comunidad, puntúa los libros que has leído y ayuda a otros lectores.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-4"
                         style="background: var(--ink-dark); color: var(--ink-gold);">
                        📖
                    </div>
                    <h3 class="font-playfair text-lg font-bold mb-2" style="color: var(--ink-header);">3. Organiza tus lecturas</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--ink-muted);">
                        Gestiona tus listas de lectura: lo que quieres leer, lo que estás leyendo y lo que ya has terminado.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════
        NUESTRA MISIÓN / DETRÁS DE INKINSPIRE
    ═══════════════════════════════════════════════════════════ --}}
    <section class="py-16 px-4 bg-white border-y border-gray-100">
        <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center gap-10">

            <div class="w-full md:w-1/3 flex justify-center">
                <div class="relative p-6 bg-amber-50 rounded-2xl border border-amber-200 shadow-sm text-center transform -rotate-2">
                    <span class="text-4xl block mb-2">💡</span>
                    <p class="font-playfair text-xl font-bold italic" style="color: var(--ink-dark);">
                        "Un libro puede cambiar tu mentalidad y tu vida."
                    </p>
                    <div class="absolute -bottom-2 -right-2 w-4 h-4 bg-amber-300 rounded-full"></div>
                </div>
            </div>

            <div class="w-full md:w-2/3 space-y-4">
                <p class="text-xs font-semibold tracking-widest uppercase" style="color: var(--ink-gold);">
                    La historia detrás del proyecto
                </p>
                <h2 class="font-playfair text-3xl font-bold" style="color: var(--ink-header);">
                    Por qué creé InkInspire
                </h2>
                <div class="text-sm leading-relaxed space-y-3" style="color: var(--ink-muted);">
                    <p>
                        Para ser honesto, nunca fui una persona a la que le gustara leer. Durante años, los libros no formaban parte de mi día a día. Sin embargo, hace unos meses todo cambió: me interesé por varios libros que, de manera inesperada, me cambiaron la mentalidad y la vida.
                    </p>
                    <p>
                        Tras experimentar ese "clic", entendí el poder transformador de la lectura. Por eso nació <b class="text-[#064e3b] font-bold">InkInspire</b>: para fomentar el hábito lector conectando a las personas de una manera dinámica y atractiva.
                    </p>
                    <p class="font-medium" style="color: var(--ink-dark);">
                        Este espacio está diseñado para que registres tus lecturas, compartas tus experiencias y descubras, tal y como me ocurrió a mí, tu próxima gran historia.
                    </p>
                </div>
            </div>

        </div>
    </section>

        {{-- ═══════════════════════════════════════════════════════════
         LIBROS MÁS VALORADOS
    ═══════════════════════════════════════════════════════════ --}}
    <section id="libros" class="py-16 px-4" style="background: #F8F7F3;">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h2 class="font-playfair text-2xl font-bold" style="color: var(--ink-header);">
                    Libros Más Valorados
                </h2>
                <p class="mt-1 text-sm" style="color: var(--ink-muted);">
                    Descubre lo que la comunidad está disfrutando ahora mismo.
                </p>
            </div>

            <div class="books-scroll">
                <div class="flex gap-6 pb-4" style="min-width: max-content;">
                    @forelse($topBooks as $book)
                    <div class="book-card" style="width: 140px;">
                        @if($book->cover_image)
                            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="book-cover">
                        @else
                            <div class="book-cover flex items-center justify-center" style="background: var(--ink-dark);">
                                <span class="font-playfair text-white text-2xl">📖</span>
                            </div>
                        @endif
                        <div class="mt-3 text-center">
                            <p class="text-sm font-semibold leading-tight" style="color: var(--ink-header);">
                                {{ Str::limit($book->title, 30) }}
                            </p>
                            <p class="text-xs mt-0.5" style="color: var(--ink-muted);">{{ Str::limit($book->author, 20) }}</p>
                            <div class="stars mt-1 text-xs">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= round($book->average_rating) ? '★' : '☆' }}
                                @endfor
                            </div>
                        </div>
                    </div>
                    @empty
                    <p style="color: var(--ink-muted);">Aún no hay libros valorados.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════
         ÚLTIMAS RESEÑAS
    ═══════════════════════════════════════════════════════════ --}}
    <section id="resenas" class="py-16 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                {{-- Reseñas --}}
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="font-playfair text-2xl font-bold" style="color: var(--ink-header);">
                            Últimas Reseñas de la Comunidad
                        </h2>
                        <a href="{{ route('register') }}"
                           class="text-sm font-medium hover:underline"
                           style="color: var(--ink-dark);">Ver todas →</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @forelse($latestReviews as $review)
                        <div class="review-card" style="background: var(--ink-bg)">
                            <div class="flex items-center gap-3 mb-3">
                                <div style="width:40px;height:40px;border-radius:50%;background:var(--ink-dark);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.85rem;flex-shrink:0;">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-sm" style="color: var(--ink-header);">{{ $review->user->name }}</p>
                                    <div class="stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            {{ $i <= $review->rating ? '★' : '☆' }}
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm font-semibold mb-1" style="color: var(--ink-dark);">
                                "{{ $review->book->title }}"
                            </p>
                            <p class="text-sm line-clamp-3" style="color: var(--ink-muted);">
                                {{ $review->body }}
                            </p>
                        </div>
                        @empty
                        <div class="review-card md:col-span-2 text-center py-8">
                            <p style="color: var(--ink-muted);">Sé el primero en escribir una reseña.</p>
                            <a href="{{ route('register') }}" class="inline-block mt-3 px-5 py-2 rounded-lg text-sm font-semibold text-white" style="background: var(--ink-dark);">
                                Únete ahora
                            </a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════
        Actividad reciente
    ═══════════════════════════════════════════════════════════ --}}
    <section id="actividad" class="py-16 px-4" style="background: #F8F7F3;">
        <div class="max-w-7xl mx-auto flex flex-col">

            <h2 class="font-playfair text-2xl font-bold mb-6" style="color: var(--ink-header);">
                Actividad Reciente
            </h2>

            <div class="review-card flex flex-col gap-4 bg-white w-full max-w-md mx-auto">
                @forelse($latestReviews->take(3) as $review)
                <div class="flex items-start gap-3">
                    <div class="activity-dot" style="background: var(--ink-dark);">
                        {{ strtoupper(substr($review->user->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0 text-left">
                        <p class="text-sm font-semibold" style="color: var(--ink-header);">{{ $review->user->name }}</p>
                        <p class="text-xs" style="color: var(--ink-muted);">
                            reseñó <span style="color: var(--ink-dark); font-weight:600;">{{ Str::limit($review->book->title, 25) }}</span>
                        </p>
                        <p class="text-xs mt-0.5" style="color: #94a3b8;">{{ $review->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-center py-4" style="color: var(--ink-muted);">Sin actividad reciente.</p>
                @endforelse

                <a href="{{ route('register') }}"
                    class="block w-full text-center py-2.5 rounded-lg text-sm font-semibold mt-2 transition"
                    style="border: 1.5px solid var(--ink-dark); color: var(--ink-dark);"
                    onmouseover="this.style.background='var(--ink-dark)';this.style.color='white'"
                    onmouseout="this.style.background='transparent';this.style.color='var(--ink-dark)'">
                    Participar ahora
                </a>
            </div>
        </div>
    </section>




    {{-- ═══════════════════════════════════════════════════════════
         CTA BANNER
    ═══════════════════════════════════════════════════════════ --}}
    <section class="py-16 px-4 bg-white">
        <div class="max-w-5xl mx-auto">
            <div class="cta-banner text-white">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h2 class="font-playfair text-2xl font-bold mb-2">
                            ¿Listo para unirte a la comunidad?
                        </h2>
                        <p class="text-sm" style="color: rgba(255,255,255,0.75);">
                            Regístrate gratis y empieza a compartir tus lecturas con miles de lectores.
                        </p>
                    </div>
                    <div class="flex gap-3 flex-shrink-0">
                        <a href="{{ route('register') }}"
                           class="px-6 py-3 rounded-lg text-sm font-semibold transition"
                           style="background: white; color: var(--ink-dark);"
                           onmouseover="this.style.background='var(--ink-gold)';this.style.color='white'"
                           onmouseout="this.style.background='white';this.style.color='var(--ink-dark)'">
                            Empezar ahora
                        </a>
                        <a href="{{ route('login') }}"
                           class="px-6 py-3 rounded-lg text-sm font-semibold transition"
                           style="border: 2px solid rgba(255,255,255,0.4); color: white;"
                           onmouseover="this.style.borderColor='white'"
                           onmouseout="this.style.borderColor='rgba(255,255,255,0.4)'">
                            Ya tengo cuenta
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════
         FOOTER
    ═══════════════════════════════════════════════════════════ --}}
    <footer style="background: var(--ink-header); color: #94a3b8;">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
                <div class="col-span-2 md:col-span-1">
                    <p class="font-playfair text-xl font-bold text-white mb-3">InkInspire</p>
                    <p class="text-sm leading-relaxed" style="color: #94a3b8;">
                        La plataforma definitiva para los amantes de las letras, donde cada página es un nuevo comienzo.
                    </p>
                </div>
                <div>
                    <p class="text-xs font-semibold tracking-widest uppercase mb-4 text-white">Comunidad</p>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('register') }}" class="hover:text-white transition">Únete</a></li>
                        <li><a href="#resenas" class="hover:text-white transition">Reseñas</a></li>
                        <li><a href="#libros" class="hover:text-white transition">Explorar libros</a></li>
                    </ul>
                </div>
                <div>
                    <p class="text-xs font-semibold tracking-widest uppercase mb-4 text-white">Soporte</p>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Centro de Ayuda</a></li>
                        <li><a href="#" class="hover:text-white transition">Contacto</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <p class="text-xs font-semibold tracking-widest uppercase mb-4 text-white">Legal</p>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Términos y Condiciones</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacidad</a></li>
                        <li><a href="#" class="hover:text-white transition">Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t pt-6 flex flex-col md:flex-row items-center justify-between gap-3" style="border-color: rgba(255,255,255,0.1);">
                <p class="text-xs">© {{ date('Y') }} InkInspire. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>
