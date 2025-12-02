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
    <div class=" estrella mt-5 flex items-center gap-4">
        <label name="star" >★</label>

        <div class="text-3xl font-bold text-gray-900">4.7</div>
        <div class="text-sm text-gray-500">{{--$valoraciones->count()--}} valoraciones</div>
    </div>

    {{-- Lista en grid 2 por fila (mitad de ancho cada una) --}}
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Card valoración --}}
        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
            <div class="flex items-center justify-between">
                
                <div class="rating">
                    <input type="radio" name="rating" id="star5" value="5" />
                    <label for="star5">★</label>

                    <input type="radio" name="rating" id="star4" value="4" />
                    <label for="star4">★</label>

                    <input type="radio" name="rating" id="star3" value="3" />
                    <label for="star3">★</label>

                    <input type="radio" name="rating" id="star2" value="2" />
                    <label for="star2">★</label>

                    <input type="radio" name="rating" id="star1" value="1" />
                    <label for="star1">★</label>
                </div>
               
                <!-- estilos para estrellas de valoracion  -->
                <style>
                    .rating {
                        direction: rtl;
                        unicode-bidi: bidi-override;
                        display: inline-flex;
                    }

                    .rating input {
                        display: none;
                    }

                    .rating label {
                        font-size: 2rem;
                        color: #ccc;
                        cursor: pointer;
                    }

                    .rating input:checked~label {
                        
                        color: gold;
                    }
                    .estrella {
                        font-size: 2rem;
                        color: gold;
                    }

                    .rating label:hover,
                    .rating label:hover~label {
                        color: gold;
                    }
                </style>

            </div>
            <p class="mt-3 text-sm text-gray-700">
                Muy profesional, rápido y limpio. Recomendadísimo.
            </p>
        </div>



    </div>
</div>