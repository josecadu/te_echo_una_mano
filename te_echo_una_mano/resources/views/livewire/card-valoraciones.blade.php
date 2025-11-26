<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
    <div class="flex items-start justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Valoraciones</h2>
            <p class="text-sm text-gray-500">Opiniones de clientes reales.</p>
        </div>
     
        <button
            type="button"
            class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-black shadow"
            title="Añadir servicio">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 5a1 1 0 0 1 1 1v5h5a1 1 0 1 1 0 2h-5v5a1 1 0 1 1-2 0v-5H6a1 1 0 1 1 0-2h5V6a1 1 0 0 1 1-1z" />
            </svg>
            Añadir valoración
        </button>
    
    </div>

    {{-- Media + iconos --}}
    <div class="mt-5 flex items-center gap-4">
        <div class="flex items-center gap-1">
            @for($i=0; $i<5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                <path d="M21.7 7.3a1 1 0 0 0-1.1-.2l-3.2 1.3-1.8-1.8 1.3-3.2a1 1 0 0 0-.2-1.1 6 6 0 0 0-7.7 7.7l-6.8 6.8a2.5 2.5 0 1 0 3.5 3.5l6.8-6.8a6 6 0 0 0 7.7-7.7z" />
                </svg>
                @endfor
        </div>

        <div class="text-3xl font-bold text-gray-900">4.7</div>
        <div class="text-sm text-gray-500">(128 valoraciones)</div>
    </div>

    {{-- Lista en grid 2 por fila (mitad de ancho cada una) --}}
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Card valoración --}}
        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="font-semibold text-gray-900">Usuario Ejemplo 1</p>
                    <p class="text-xs text-gray-500">hace 2 días</p>
                </div>
                <div class="flex items-center gap-1">
                    @for($i=0; $i<5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 17.3l-6.2 3.3 1.2-7-5-4.9 7-1 3.1-6.4 3.1 6.4 7 1-5 4.9 1.2 7z" />
                        </svg>
                        @endfor
                </div>
            </div>
            <p class="mt-3 text-sm text-gray-700">
                Muy profesional, rápido y limpio. Recomendadísimo.
            </p>
        </div>

        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="font-semibold text-gray-900">Usuario Ejemplo 2</p>
                    <p class="text-xs text-gray-500">hace 1 semana</p>
                </div>
                <div class="flex items-center gap-1">
                    @for($i=0; $i<4; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 17.3l-6.2 3.3 1.2-7-5-4.9 7-1 3.1-6.4 3.1 6.4 7 1-5 4.9 1.2 7z" />
                        </svg>
                        @endfor
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 17.3l-6.2 3.3 1.2-7-5-4.9 7-1 3.1-6.4 3.1 6.4 7 1-5 4.9 1.2 7z" />
                        </svg>
                </div>
            </div>
            <p class="mt-3 text-sm text-gray-700">
                Buen trabajo aunque se retrasó un poco. Aun así repetiría.
            </p>
        </div>

        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="font-semibold text-gray-900">Usuario Ejemplo 3</p>
                    <p class="text-xs text-gray-500">hace 2 meses</p>
                </div>
                <div class="flex items-center gap-1">
                    @for($i=0; $i<5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 17.3l-6.2 3.3 1.2-7-5-4.9 7-1 3.1-6.4 3.1 6.4 7 1-5 4.9 1.2 7z" />
                        </svg>
                        @endfor
                </div>
            </div>
            <p class="mt-3 text-sm text-gray-700">
                Perfecto. Me arregló todo en una hora. 10/10.
            </p>
        </div>

        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="font-semibold text-gray-900">Usuario Ejemplo 4</p>
                    <p class="text-xs text-gray-500">hace 4 meses</p>
                </div>
                <div class="flex items-center gap-1">
                    @for($i=0; $i<3; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 17.3l-6.2 3.3 1.2-7-5-4.9 7-1 3.1-6.4 3.1 6.4 7 1-5 4.9 1.2 7z" />
                        </svg>
                        @endfor
                        @for($i=0; $i<2; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 17.3l-6.2 3.3 1.2-7-5-4.9 7-1 3.1-6.4 3.1 6.4 7 1-5 4.9 1.2 7z" />
                            </svg>
                            @endfor
                </div>
            </div>
            <p class="mt-3 text-sm text-gray-700">
                Todo bien pero mejorable en puntualidad.
            </p>
        </div>

    </div>
</div>