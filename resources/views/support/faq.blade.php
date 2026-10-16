<x-app-layout>
    <x-slot name="title">
        FAQ - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 sm:py-12">
        <article class="help-article mx-auto max-w-4xl">
            <header class="mb-8 border-b border-[#D4AF37]/60 pb-7 sm:mb-10 sm:pb-8">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.22em] text-[#64748B]">
                    InkInspire · FAQ
                </p>
                <h1 class="font-playfair text-3xl font-bold leading-tight text-[#064E3B] sm:text-5xl">
                    Preguntas frecuentes
                </h1>
                <p class="mt-4 max-w-2xl text-base leading-7 text-[#334155]">
                    Respuestas rápidas a las dudas más habituales. Si necesitas más detalle, consulta
                    el Centro de Ayuda.
                </p>
            </header>

            <div class="space-y-5">
                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">1</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">General</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class="text-lg font-semibold text-[#0F172A]">¿Qué es InkInspire?</h3>
                            <p class="leading-7 text-[#334155]">
                                Es una plataforma para lectores donde puedes descubrir libros, valorarlos, escribir reseñas, organizar tus lecturas en listas
                                y compartir opiniones con otros usuarios.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-[#0F172A]">¿Es gratis?</h3>
                            <p class="leading-7 text-[#334155]">
                                Sí, registrarte y usar InkInspire no tiene ningún coste.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-[#0F172A]">¿Necesito una cuenta para usar la plataforma?</h3>
                            <p class="leading-7 text-[#334155]">
                                Sí necesitas crear una cuenta para navegar, consultar libros, crear reseñas, valorar libros, comentar, crear listas
                                o seguir a otros usuarios.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-[#0F172A]">¿Hay edad mínima para registrarse?</h3>
                            <p class="leading-7 text-[#334155]">
                                Sí, necesitas tener al menos 14 años para registrarte en InkInspire.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">2</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Cuenta</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">¿Cómo recupero mi contraseña?</h3>
                            <p class="leading-7 text-[#334155]">
                                En la pantalla de inicio de sesión, pulsa “¿Has olvidado tu contraseña?” y sigue las
                                instrucciones que te llegarán por correo.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">¿Puedo cambiar mi nombre de usuario o mi correo?</h3>
                            <p class="leading-7 text-[#334155]">
                                Sí, desde los ajustes de tu cuenta.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">¿Cómo elimino mi cuenta?</h3>
                            <p class="leading-7 text-[#334155]">
                                Desde los ajustes de tu cuenta o escribiéndonos desde Contacto. Se borrarán tus datos personales y tu
                                actividad se eliminará o se anonimizará.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">3</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Reseñas y contenido</h2>
                    </div>

                    <div>
                        <h3 class=" text-lg font-semibold text-[#0F172A]">¿Puedo editar o borrar una reseña después de publicarla?</h3>
                        <p class="leading-7 text-[#334155]">
                            Sí, en cualquier momento.
                        </p>
                    </div>

                    <div>
                        <h3 class=" text-lg font-semibold text-[#0F172A]">¿Qué pasa si veo una reseña o un comentario inapropiado?</h3>
                        <p class="leading-7 text-[#334155]">
                            Escríbenos desde Contacto con el enlace y el motivo. Retiramos el contenido que incumple las normas de uso.
                        </p>
                    </div>

                    <div>
                        <h3 class=" text-lg font-semibold text-[#0F172A]">¿Pueden retirarme una reseña?</h3>
                        <p class="leading-7 text-[#334155]">
                            Solo si incumple los Términos y Condiciones: contenido ofensivo, ilegal, spam o que vulnere derechos de terceros.
                        </p>
                    </div>

                    <div>
                        <h3 class=" text-lg font-semibold text-[#0F172A]">¿De dónde sale la información de los libros?</h3>
                        <p class="leading-7 text-[#334155]">
                            De la API de Google Books. Por eso puede haber libros con datos incompletos o portadas que faltan.
                        </p>
                    </div>

                    <div>
                        <h3 class=" text-lg font-semibold text-[#0F172A]">¿Puedo añadir un libro que no aparece?</h3>
                        <p class="leading-7 text-[#334155]">
                            De momento no, porque el catálogo depende de Google Books. Si echas en falta alguno, cuéntanoslo desde Contacto.
                        </p>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">4</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Privacidad y datos</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">¿Qué datos guardáis de mí?</h3>
                            <p class="leading-7 text-[#334155]">
                                Tu correo, tu nombre o alias, tu contraseña (cifrada) y el contenido que publicas. Todo el detalle está en la Política de Privacidad.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">¿Vendéis mis datos?</h3>
                            <p class="leading-7 text-[#334155]">
                                No. No vendemos ni cedemos tus datos a terceros con fines comerciales.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">¿Usáis cookies?</h3>
                            <p class="leading-7 text-[#334155]">
                                Solo cookies técnicas necesarias para que funcione el inicio de sesión y la seguridad de los formularios.
                                No usamos cookies de publicidad ni de seguimiento. Más información en la Política de Cookies.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">¿Cómo ejerzo mis derechos sobre mis datos?</h3>
                            <p class="leading-7 text-[#334155]">
                                Escríbenos a [tu email] indicando qué derecho quieres ejercer. Te respondemos en un máximo de un mes.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">5</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Problemas y soporte</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Algo no me funciona, ¿qué hago?</h3>
                            <p class="leading-7 text-[#334155]">
                                Prueba a recargar la página y a cerrar e iniciar sesión de nuevo. Si el problema continúa, escríbenos desde
                                Contacto indicando qué ha pasado, en qué página y con qué navegador.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">¿En cuánto tiempo me responden?</h3>
                            <p class="leading-7 text-[#334155]">
                                Normalmente entre 2 y 3 días laborables.
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </article>
    </div>
</x-app-layout>
