<x-app-layout>
    <x-slot name="title">
        Política de cookies - {{ config('app.name', 'InkInspire') }}
    </x-slot>
    <div class="mx-auto max-w-4xl py-8 sm:py-12">
        <article class="mx-auto max-w-3xl">
            <header class="mb-8 border-b border-[#D4AF37]/60 pb-7 sm:mb-10 sm:pb-8">
                <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-[#64748B]">InkInspire · Documento legal</p>
                <h1 class="font-playfair text-3xl font-bold leading-tight text-[#064E3B] sm:text-4xl">
                    Política de Cookies
                </h1>
                <p class="mt-4 text-sm text-[#64748B]">Última actulización: 29 de septiembre de 2026</p>
            </header>

            <div class="divide-y divide-[#DDE5DF]">
                <section class="py-6 first:pt-0 sm:py-7">
                    <h2 class="mb-3 font-playfair text-xl font-bold text-[#064E3B] sm:text-2xl">1. ¿Qué son las cookies?</h2>
                    <p class="leading-7 text-[#334155]">
                        Las cookies son pequeños archivos que un sitio web guarda en tu navegador cuando lo visitas.
                        Permiten, por ejemplo, recordar que has iniciado sesión o proteger el sitio frente a usos malintencionados.
                    </p>
                </section>

                <section class="py-6 sm:py-7">
                    <h2 class="mb-3 font-playfair text-xl font-bold text-[#064E3B] sm:text-2xl">2. Qué cookies utiliza InkInspire</h2>
                    <p class="leading-7 text-[#334155]">
                        Actualmente InkInspire solo utiliza cookies técnicas o estrictamente necesarias, que permiten el funcionamiento básico del sitio. Al ser
                        imprescindibles para prestar el servicio que solicitas, están exentas de consentimiento conforme al artículo 22.2 de la Ley 34/2002 (LSSI-CE).
                    </p>
                    <div class="mt-4 overflow-hidden rounded-lg border border-[#DDE5DF] bg-white">
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[560px] border-collapse text-left text-sm text-[#334155]">
                                <thead class="bg-[#064E3B] text-white">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 font-semibold sm:px-5">Cookie</th>
                                        <th scope="col" class="px-4 py-3 font-semibold sm:px-5">Finalidad</th>
                                        <th scope="col" class="px-4 py-3 font-semibold sm:px-5">Duración</th>
                                        <th scope="col" class="px-4 py-3 font-semibold sm:px-5">Tipo</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#DDE5DF]">
                                    <tr class="even:bg-[#F7F8F5]">
                                        <td class="px-4 py-3 leading-6 sm:px-5">laravel_session</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Mantiene tu sesión iniciada mientras navegas</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Hasta cerrar el navegador o 2 horas de inactividad</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Propia, técnica</td>
                                    </tr>
                                    <tr class="even:bg-[#F7F8F5]">
                                        <td class="px-4 py-3 leading-6 sm:px-5">XSRF-TOKEN</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Protege los formularios frente a ataques CSRF</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Sesión</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Propia, técnica</td>
                                    </tr>
                                    <tr class="even:bg-[#F7F8F5]">
                                        <td class="px-4 py-3 leading-6 sm:px-5">remember_web_*</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Recuerda tu sesión si marcas "Recuérdame"</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Hasta 5 años, o hasta que cierres sesión</td>
                                        <td class="px-4 py-3 leading-6 sm:px-5">Propia, técnica</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="leading-7 text-[#334155] mt-4">
                        No utilizamos cookies de publicidad, de analítica ni de seguimiento, ni propias ni de terceros.
                    </p>
                </section>

                <section class="py-6 sm:py-7">
                    <h2 class="mb-3 font-playfair text-xl font-bold text-[#064E3B] sm:text-2xl">3. Cómo gestionar o eliminar las cookies</h2>

                    <p class="mt-3 leading-7 text-[#334155]">
                        Puedes permitir, bloquear o eliminar las cookies desde la configuración de tu navegador. Ten en cuenta que, si
                        bloqueas las cookies técnicas, algunas funciones del sitio (como iniciar sesión) dejarán de funcionar. Encontrarás instrucciones en:
                    </p>
                    <ul class="mt-3 mb-3 list-disc space-y-2 pl-5 leading-7 text-[#334155] marker:text-[#D4AF37]">
                        <li>Chrome: support.google.com/chrome/answer/95647</li>
                        <li>Firefox: support.mozilla.org/es/kb/borrar-cookies</li>
                        <li>Safari: support.apple.com/es-es/guide/safari/sfri11471/mac</li>
                        <li>Edge: support.microsoft.com/es-es/microsoft-edge</li>
                    </ul>
                </section>

                <section class="py-6 sm:py-7">
                    <h2 class="mb-3 font-playfair text-xl font-bold text-[#064E3B] sm:text-2xl">4. Cambios en la política de cookies</h2>
                    <p class="leading-7 text-[#334155]">
                        Si en el futuro incorporamos otras cookies (por ejemplo, de analítica), actualizaremos esta política y
                        solicitaremos tu consentimiento previo cuando corresponda.
                    </p>
                </section>

                <section class="py-6 sm:py-7">
                    <h2 class="mb-3 font-playfair text-xl font-bold text-[#064E3B] sm:text-2xl">5. Contacto</h2>
                    <p class="leading-7 text-[#334155]">
                        Para cualquier duda sobre el uso de cookies, escríbenos a jefferson.vivas.95@outlook.es.
                    </p>
                </section>
            </div>
        </article>
    </div>
</x-app-layout>
