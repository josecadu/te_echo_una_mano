<div class="bg-gray-200 bg-opacity-25 grid grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 p-2 lg:p-4">

    <!-- Recuadro grande izquierda -->
<div class="col-span-2 md:col-span-2"> 
    <livewire:mostrar-profesionales />
</div>
    


    <!-- Contenedor para los dos recuadros pequeños a la derecha -->
    <div class="grid grid-cols-1 col-span-1 flex gap-2 h-full">
        @guest
        <!-- parte pequeña inferior -->
        <div class="bg-white p-6 justify-content-center rounded-lg shadow-md h-full">
            <x-button class="ml-7 hover:bg-amber-600" wire:click="abrirLogin">Entrar</x-button>

            @if (Route::has('register'))

            <x-button class="ml-7 hover:bg-amber-600" wire:click="abrirRegistro">REGISTRO</x-button>
            @endif
        </div>
        @endguest

        <!-- Recuadro pequeño superior -->


        <div class="bg-white p-4 rounded-lg shadow-md h-full">

            <div
                id="mapa-profesionales"
                class="w-full h-80 border border-gray-300 rounded-lg overflow-hidden"
                data-marcadores='@json($marcadores ?? [])'>

            </div>

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
                        // Mensaje en consola si no hay ninguno
                        console.warn('No hay profesionales con lat/lng para mostrar en el mapa.');
                    }
                }

                document.addEventListener('DOMContentLoaded', initMapaProfesionales);
                document.addEventListener('livewire:navigated', initMapaProfesionales);
            </script>
        </div>
        
        <x-dialog-modal wire:model="profesionalModal">
            <x-slot name="title">

            </x-slot>

            <x-slot name="content">
                <livewire:hacer-profesional />
            </x-slot>


        </x-dialog-modal>

    </div>
</div>