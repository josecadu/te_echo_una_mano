<div class="bg-transparent py-1 pt-6">
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
        <div class="bg-white/20 backdrop-blur-sm overflow-hidden sm:rounded-3xl">
            <div class="p-3 lg:p-4 bg-white/40">

                {{-- GRID PRINCIPAL: IZQ LISTA / DCHA MAPA + LOGIN --}}
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-8">

                    <!-- Recuadro grande izquierda -->
                    <div class="lg:col-span-3">
                        <livewire:mostrar-profesionales />
                    </div>

                    <!-- Contenedor para los dos recuadros pequeños a la derecha -->
                    <div class="lg:col-span-2 flex flex-col gap-3 h-full">

                        @guest
                        <!-- Recuadro login/registro -->

                        <div class="bg-white p-4 rounded-2xl shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900 mb-3 text-center">¿Ya tienes cuenta?</h2>
                            <div class="flex flex-wrap gap-3 justify-center">
                                <x-button class="hover:bg-amber-600" wire:click="abrirLogin">
                                    Entrar
                                </x-button>

                                @if (Route::has('register'))
                                <x-button class="hover:bg-amber-600" wire:click="abrirRegistro">
                                    REGISTRO
                                </x-button>
                                @endif
                            </div>
                        </div>
                        @endguest

                        <!-- Recuadro mapa -->
                        <div class="bg-white p-4 rounded-2xl shadow-md flex-1">
                            <div
                                id="mapa-profesionales"
                                class="w-full h-80 border border-gray-300 rounded-lg overflow-hidden"
                                data-marcadores='@json($marcadores ?? [])'>
                            </div>

                            <style>
                                #mapa-profesionales .leaflet-pane,
                                #mapa-profesionales .leaflet-top,
                                #mapa-profesionales .leaflet-bottom {
                                    z-index: 10 !important;
                                }
                            </style>

                            <script>
                                function initMapaProfesionales() {
                                    const el = document.getElementById('mapa-profesionales');
                                    if (!el) {
                                        console.warn('No encuentro el div del mapa');
                                        return;
                                    }

                                    let raw = el.dataset.marcadores || '[]';
                                    let marcadores = [];

                                    try {
                                        marcadores = JSON.parse(raw);
                                    } catch (e) {
                                        console.error('Error parseando marcadores', e, raw);
                                        marcadores = [];
                                    }

                                    console.log('Marcadores recibidos:', marcadores);

                                    const hasMarkers = Array.isArray(marcadores) && marcadores.length > 0;

                                    // Centro por defecto: España
                                    const center = hasMarkers ? [marcadores[0].lat, marcadores[0].lng] : [40.4168, -3.7038];

                                    // Evitar reinicializar
                                    if (el._leaflet_id) {
                                        return;
                                    }

                                    const map = L.map('mapa-profesionales').setView(center, hasMarkers ? 12 : 5);

                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                        attribution: '&copy; OpenStreetMap'
                                    }).addTo(map);

                                    if (hasMarkers) {
                                        marcadores.forEach(m => {
                                            L.marker([m.lat, m.lng])
                                                .addTo(map)
                                                .bindPopup(`<strong>${m.name}</strong><br>${m.oficio}</strong><br>${m.email}`);
                                        });
                                    } else {
                                        console.warn('No hay profesionales con lat/lng para mostrar en el mapa.');
                                    }
                                }

                                document.addEventListener('DOMContentLoaded', initMapaProfesionales);
                                document.addEventListener('livewire:navigated', initMapaProfesionales);
                            </script>
                        </div>

                        <x-dialog-modal wire:model="profesionalModal">
                            <x-slot name="title"></x-slot>

                            <x-slot name="content">
                                <livewire:hacer-profesional />
                            </x-slot>

                            <x-slot name="footer"></x-slot>
                        </x-dialog-modal>

                    </div>
                </div>

                <livewire:valorar-profesional/>
            </div>
        </div>
    </div>
</div>