<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-transparent py-10">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">

            {{-- HERO PRINCIPAL --}}
            <section class="rounded-3xl bg-white/30 backdrop-blur-sm shadow-xl p-8 lg:p-12 border border-white/20">
                
                <div class="text-center space-y-4">
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight">
                        Bienvenido a 
                        <span class="italic font-serif text-amber-600">Te Echo Una Mano</span>
                    </h1>

                    <p class="text-gray-700 text-lg max-w-2xl mx-auto font-light">
                        Encuentra profesionales cerca de ti, revisa valoraciones reales y obtén ayuda rápida 
                        para cualquier servicio del hogar. Fácil, rápido y sin complicaciones.
                    </p>

                    <div class="flex justify-center gap-4 pt-4">
                        <a href="{{ url('/usuarios') }}"
                           class="px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-semibold shadow-md transition">
                            Ver profesionales
                        </a>

                    </div>
                </div>

            </section>

            {{-- SECCIÓN DE BENEFICIOS --}}
            <section class="mt-12 grid md:grid-cols-3 gap-6">

                <div class="bg-white/40 backdrop-blur-sm p-6 rounded-2xl shadow border border-white/20">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Profesionales verificados</h3>
                    <p class="text-sm text-gray-600">
                        Todos los profesionales pasan un proceso de verificación para garantizar calidad y seguridad.
                    </p>
                </div>

                <div class="bg-white/40 backdrop-blur-sm p-6 rounded-2xl shadow border border-white/20">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Valoraciones reales</h3>
                    <p class="text-sm text-gray-600">
                        Opiniones basadas en trabajos completados, siempre visibles y transparentes.
                    </p>
                </div>

                <div class="bg-white/40 backdrop-blur-sm p-6 rounded-2xl shadow border border-white/20">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Mapa interactivo</h3>
                    <p class="text-sm text-gray-600">
                        Encuentra quién está más cerca usando nuestro mapa dinámico con geolocalización.
                    </p>
                </div>

            </section>

        </div>
    </div>

    <x-slot name="footer"></x-slot>
</x-app-layout>
