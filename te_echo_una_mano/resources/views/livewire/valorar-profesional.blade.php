<x-dialog-modal wire:model="serviciosValoracionesModal" maxWidth="4xl">
    {{-- TÍTULO MODAL --}}
    <x-slot name="title">
        <h2 class="text-lg font-semibold text-gray-900">
            Detalle del profesional
        </h2>
        <p class="text-xs text-gray-500">
            Información básica, valoraciones y servicios.
        </p>
    </x-slot>

    {{-- CONTENIDO MODAL --}}
    <x-slot name="content">
        <div class="max-h-[70vh] overflow-y-auto w-full space-y-4">

            {{-- ⭐ BLOQUE SUPERIOR COMPACTO --}}
            <section class="bg-white rounded-xl border border-gray-100 p-3 sm:p-4">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

                    {{-- IZQUIERDA --}}
                    <div class="flex flex-1 gap-3">
                        {{-- Foto más pequeña --}}
                        <div class="w-16 h-16 rounded-xl bg-gray-100 overflow-hidden ring-1 ring-gray-200 flex-shrink-0">
                            <img
                                src="https://via.placeholder.com/150"
                                class="w-full h-full object-cover">
                        </div>

                        {{-- Datos compactos --}}
                        <div class="flex flex-col justify-center gap-0.5 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 truncate">
                                Nombre del profesional
                            </p>

                            <p class="text-xs text-gray-600 truncate">
                                profesional@ejemplo.com · Electricista
                            </p>

                            <p class="text-[10px] text-gray-500 truncate">
                                C/ Ejemplo 123 · 2,3 km
                            </p>
                        </div>
                    </div>

                    {{-- DERECHA: valoración compacta --}}
                    <div class="flex items-center justify-center md:justify-end flex-none">
                        <div class="flex flex-col items-center justify-center p-2 rounded-xl bg-amber-50 border border-amber-100 leading-tight">
                            <div class="text-amber-500 text-2xl leading-none">
                                ★
                            </div>
                            <div class="text-lg font-semibold text-gray-900 leading-none">
                                4.5
                            </div>
                            <div class="text-[10px] text-gray-500 mt-0.5 leading-none">
                                (23 valoraciones)
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- RESTO IGUAL: SERVICIOS + VALORACIONES --}}
            <div class="grid md:grid-cols-5 gap-4">

                {{-- SERVICIOS (3/5) --}}
                <section class="md:col-span-3 bg-white rounded-xl border border-gray-100 p-3 sm:p-4 space-y-2">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-gray-900">
                            Servicios disponibles
                        </h3>
                        <p class="text-[10px] text-gray-500">
                            Nombre y precio.
                        </p>
                    </div>

                    <div class="divide-y divide-gray-100">
                        <div class="py-2 flex items-center justify-between">
                            <p class="text-sm text-gray-800 truncate">Instalación de enchufes</p>
                            <p class="text-sm font-semibold">Desde 30 €</p>
                        </div>

                        <div class="py-2 flex items-center justify-between">
                            <p class="text-sm text-gray-800 truncate">Averías eléctricas</p>
                            <p class="text-sm font-semibold">Según diagnóstico</p>
                        </div>

                        <div class="py-2 flex items-center justify-between">
                            <p class="text-sm text-gray-800 truncate">Boletines eléctricos</p>
                            <p class="text-sm font-semibold">Desde 80 €</p>
                        </div>
                    </div>
                </section>

                {{-- VALORACIONES (2/5) --}}
                <section class="md:col-span-2 bg-white rounded-xl border border-gray-100 p-3 sm:p-4 space-y-2">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-gray-900">
                            Valoraciones
                        </h3>
                        <p class="text-[10px] text-gray-500">
                            23 opiniones
                        </p>
                    </div>

                    <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                        <article class="border border-gray-100 rounded-xl p-2 space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold">Usuario 1</span>
                                <span class="text-[11px] text-amber-500">★★★★★</span>
                            </div>
                            <p class="text-[11px] text-gray-600 line-clamp-2">
                                Muy puntual y profesional, dejó la zona limpia.
                            </p>
                            <p class="text-[10px] text-gray-400">12/11/2025</p>
                        </article>

                        <article class="border border-gray-100 rounded-xl p-2 space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold">Usuario 2</span>
                                <span class="text-[11px] text-amber-500">★★★★★</span>
                            </div>
                            <p class="text-[11px] text-gray-600 line-clamp-2">
                                Nos resolvió una avería complicada el mismo día.
                            </p>
                            <p class="text-[10px] text-gray-400">05/11/2025</p>
                        </article>
                    </div>
                </section>
            </div>
        </div>
    </x-slot>

    {{-- FOOTER --}}
    <x-slot name="footer">
        <x-secondary-button type="button" wire:click="$set('serviciosValoracionesModal', false)">
            Cerrar
        </x-secondary-button>
    </x-slot>
</x-dialog-modal>
