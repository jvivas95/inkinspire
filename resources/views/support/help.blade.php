<x-app-layout>
    <x-slot name="title">
        Centro de ayuda - {{ config('app.name', 'InkInspire') }}
    </x-slot>

    <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 sm:py-12">
        <article class="help-article mx-auto max-w-4xl">
            <header class="mb-8 border-b border-[#D4AF37]/60 pb-7 sm:mb-10 sm:pb-8">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.22em] text-[#64748B]">
                    InkInspire · Centro de ayuda
                </p>
                <h1 class="font-playfair text-3xl font-bold leading-tight text-[#064E3B] sm:text-5xl">
                    Centro de ayuda
                </h1>
                <p class="mt-4 max-w-2xl text-base leading-7 text-[#334155]">
                    Aquí encontrarás guías para sacar el máximo partido a InkInspire. Si no encuentras lo que buscas,
                    escríbenos desde la página de Contacto.
                </p>
            </header>

            <div class="mb-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl border border-[#DDE5DF] bg-[#F8FAF7] p-4 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#D4AF37]">Inicio</p>
                    <p class="mt-2 font-playfair text-xl font-bold text-[#064E3B]">Primeros pasos</p>
                </div>
                <div class="rounded-2xl border border-[#DDE5DF] bg-[#F8FAF7] p-4 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#D4AF37]">Lectura</p>
                    <p class="mt-2 font-playfair text-xl font-bold text-[#064E3B]">Reseñas</p>
                </div>
                <div class="rounded-2xl border border-[#DDE5DF] bg-[#F8FAF7] p-4 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#D4AF37]">Organiza</p>
                    <p class="mt-2 font-playfair text-xl font-bold text-[#064E3B]">Listas</p>
                </div>
                <div class="rounded-2xl border border-[#DDE5DF] bg-[#F8FAF7] p-4 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#D4AF37]">Comunidad</p>
                    <p class="mt-2 font-playfair text-xl font-bold text-[#064E3B]">Seguridad</p>
                </div>
            </div>

            <div class="space-y-5">
                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">1</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Primeros pasos</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class="text-lg font-semibold text-[#0F172A]">Crea tu cuenta</h3>
                            <p class="leading-7 text-[#334155]">
                                Pulsa en “Registrarse”, escribe tu nombre o alias, tu correo electrónico y una contraseña.
                                Una vez dentro, ya puedes valorar libros, escribir reseñas y crear tus listas de lectura.
                                Necesitas tener al menos 14 años para registrarte.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-[#0F172A]">Completa tu perfil</h3>
                            <p class="leading-7 text-[#334155]">
                                Desde tu perfil puedes añadir una imagen y una descripción. Son datos opcionales y tú decides
                                cuánto quieres mostrar.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-[#0F172A]">Busca libros</h3>
                            <p class="leading-7 text-[#334155]">
                                Usa el buscador para encontrar libros por título o autor. La información de cada libro (portada,
                                autor, sinopsis) se obtiene de Google Books, así que en algunos casos puede faltar algún dato.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">2</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Reseñas y valoraciones</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Escribe una reseña</h3>
                            <p class="leading-7 text-[#334155]">
                                Entra en la ficha del libro, pulsa en “Escribir reseña”, añade tu valoración y tu opinión,
                                y publícala. Puedes contar qué te ha parecido sin miedo a destripar el final, pero si mencionas
                                giros importantes de la trama, avisa al principio de tu reseña.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Edita o elimina tu reseña</h3>
                            <p class="leading-7 text-[#334155]">
                                Puedes modificar o borrar tus reseñas en cualquier momento desde tu perfil o desde la propia
                                ficha del libro.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Comenta reseñas de otros</h3>
                            <p class="leading-7 text-[#334155]">
                                Puedes responder a las reseñas de otros lectores. Te pedimos respeto: se valora el debate, no los
                                ataques personales.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">3</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Listas de lectura</h2>
                    </div>

                    <div>
                        <h3 class=" text-lg font-semibold text-[#0F172A]">Crea y organiza listas</h3>
                        <p class="leading-7 text-[#334155]">
                            Puedes guardar los libros que quieres leer, estás leyendo o ya has terminado. Añade un libro a una
                            lista desde su ficha y gestiona tus listas desde tu perfil.
                        </p>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">4</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Comunidad</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Sigue a otros lectores</h3>
                            <p class="leading-7 text-[#334155]">
                                Entra en el perfil de otro usuario y pulsa “Seguir”. Así verás su actividad y recibirás
                                notificaciones de lo que publique.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Notificaciones</h3>
                            <p class="leading-7 text-[#334155]">
                                Te avisamos cuando alguien comenta tu reseña o empieza a seguirte. Las verás dentro de la plataforma.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Denuncia contenido</h3>
                            <p class="leading-7 text-[#334155]">
                                Si ves un contenido que incumple las normas de uso (insultos, spam, contenido ilegal), escríbenos
                                desde la página de Contacto indicando el enlace a la publicación y el motivo. Lo revisaremos lo antes posible.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">5</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Cuenta y seguridad</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Cambia tu contraseña</h3>
                            <p class="leading-7 text-[#334155]">
                                Puedes hacerlo desde los ajustes de tu cuenta. Si no recuerdas la actual, usa la opción
                                “¿Has olvidado tu contraseña?” en la pantalla de inicio de sesión y te enviaremos un enlace a tu correo.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Cambia tu correo o tus datos</h3>
                            <p class="leading-7 text-[#334155]">
                                Puedes actualizarlos desde los ajustes de tu cuenta.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Elimina tu cuenta</h3>
                            <p class="leading-7 text-[#334155]">
                                Puedes darte de baja desde los ajustes de tu cuenta o escribiéndonos. Al hacerlo, tus datos personales
                                se borran y tus reseñas y comentarios se eliminan o se anonimizan. Esta acción no se puede deshacer.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Tus datos y tu privacidad</h3>
                            <p class="leading-7 text-[#334155]">
                                Para saber qué datos guardamos y cómo ejercer tus derechos de acceso, rectificación o supresión,
                                consulta nuestra Política de Privacidad.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#DDE5DF] bg-white p-5 shadow-[0_2px_12px_rgba(15,23,42,0.04)] sm:p-7">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#064E3B] text-sm font-bold text-[#F8FAF7]">6</span>
                        <h2 class="font-playfair text-2xl font-bold text-[#064E3B] sm:text-3xl">Problemas técnicos</h2>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">No puedo iniciar sesión</h3>
                            <p class="leading-7 text-[#334155]">
                                Comprueba que el correo y la contraseña son correctos y que no tienes bloqueadas las cookies técnicas
                                del navegador. Si sigue sin funcionar, restablece tu contraseña.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">No me llega el correo de recuperación</h3>
                            <p class="leading-7 text-[#334155]">
                                Revisa la carpeta de spam. Si pasados unos minutos no ha llegado, vuelve a solicitarlo o escríbenos.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Un libro no aparece o tiene datos incorrectos</h3>
                            <p class="leading-7 text-[#334155]">
                                La información procede de Google Books y no podemos modificarla directamente. Si crees que hay un
                                error grave, avísanos desde Contacto.
                            </p>
                        </div>

                        <div>
                            <h3 class=" text-lg font-semibold text-[#0F172A]">Algo no funciona como debería</h3>
                            <p class="leading-7 text-[#334155]">
                                Cuéntanos qué ha pasado, en qué página y con qué navegador. Con esos datos nos resulta mucho más fácil
                                encontrar el fallo.
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </article>
    </div>
</x-app-layout>
