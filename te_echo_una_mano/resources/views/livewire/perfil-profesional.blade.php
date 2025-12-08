<div class="bg-transparent py-1 pt-6">
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
        <div class="bg-white/20 backdrop-blur-sm overflow-hidden sm:rounded-3xl">
            <div class="p-3 lg:p-4 bg-white/40">

                {{-- GRID PRINCIPAL: PERFIL (1/3) + CONTENIDO (2/3) --}}
                <div class="grid grid-cols-2 lg:grid-cols-7 gap-4 lg:gap-6">


                    {{-- COLUMNA IZQUIERDA: PERFIL PROFESIONAL --}}
                    <aside class="lg:col-span-2">
                        <div class="h-full bg-white/80 rounded-2xl shadow-sm border border-gray-100 p-4 flex flex-col items-center text-center gap-3">

                            {{-- Foto circular --}}
                            {{-- Foto + datos principales --}}
                            <div class="mt-4 flex flex-col items-center text-center">
                                <div class="w-36 h-36 rounded-full overflow-hidden ring-3 ring-amber-200 shadow">
                                    <img
                                        src="{{ Storage::url($perfilPro->foto_perfil) }}"
                                        alt="Foto profesional"
                                        class="w-full h-full object-cover" />

                                </div>

                                <h3 class="mt-3 text-2xl font-semibold text-gray-900">
                                    {{ $perfilPro->user->name }}
                                </h3>
                                <p class="text-xs text-gray-500">
                                    Oficio: <span class="font-semibold text-gray-800">{{ $perfilPro->oficio }}</span>
                                </p>

                                <div class="mt-3 w-full space-y-2 text-xs">

                                    {{-- EMAIL --}}
                                    <div class="flex items-center gap-3 bg-white rounded-xl border border-gray-200 p-2.5">
                                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 text-sm">
                                            ✉
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-[11px] text-gray-500 leading-none">Email</p>
                                            <p class="font-medium text-gray-900 leading-none break-all text-xs">
                                                {{ $perfilPro->user->email }}
                                            </p>
                                        </div>
                                    </div>

                                    {{-- DIRECCIÓN --}}
                                    <div class="flex items-center gap-3 bg-white rounded-xl border border-gray-200 p-2.5">
                                        <div class="w-10 h-8 flex items-center justify-center rounded-full bg-amber-100 text-amber-600 text-sm">
                                            📍
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-[11px] text-gray-500 leading-none">Dirección</p>
                                            <p class="font-medium text-gray-900 leading-none text-xs">
                                                {{ $perfilPro->user->direccion }}
                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            {{-- Resumen de valoración --}}
                            <div class="mt-1 flex flex-col items-center gap-0.5">
                                <button wire:click="$dispatch('onHuevoB')"
                                    class="absolute rounded rounded-xl top-0 bg-amber-300 left-1 w-2 h-2 "></button>
                                <span class="text-[30px] ">
                                    {{ $score }}<i class="fa-solid fa-star text-yellow-400"></i>
                                </span>
                                <p class="text-[11px] text-gray-500 leading-none">
                                    ({{$perfilPro->valoraciones()->count()}} valoraciones)
                                </p>
                            </div>


                        </div>
                    </aside>

                    {{-- COLUMNA DERECHA: TAGS + CONTENIDO (SERVICIOS / VALORACIONES) --}}
                    <section class="lg:col-span-5 space-y-3">

                        {{-- TAGS / PESTAÑAS SUPERIORES --}}
                        <div class="flex items-center gap-2 text-xs">
                            {{-- Tag Servicios (activo por defecto) --}}
                            <button
                                type="button" wire:click="$set('serv', true)"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full font-medium shadow-sm
                    {{ $serv ? 'bg-amber-500 text-white' : 'bg-white/70 text-gray-700 border border-gray-200 hover:bg-white/90' }}">
                                <span class="w-1.5 h-1.5 rounded-full
                     {{ $serv ? 'bg-white/80' : 'bg-gray-300' }}"></span>
                                Servicios
                            </button>

                            {{-- Tag Valoraciones (inactivo visualmente, luego cambia estado con Livewire) --}}
                            <button
                                type="button" wire:click="$set('serv', false)"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full font-medium shadow-sm
                    {{ !$serv ? 'bg-amber-500 text-white' : 'bg-white/70 text-gray-700 border border-gray-200 hover:bg-white/90' }}">
                                <span class="w-1.5 h-1.5 rounded-full
                     {{ !$serv ? 'bg-white/80' : 'bg-gray-300' }}"></span>
                                Valoraciones
                            </button>
                        </div>

                        {{-- CONTENEDOR PRINCIPAL DERECHA --}}
                        <div class="bg-white/80 rounded-2xl shadow-sm border border-gray-100 p-3 sm:p-4 space-y-4">

                            {{-- ============================= --}}
                            {{-- BLOQUE SERVICIOS (VISTA 1)   --}}
                            {{-- ============================= --}}

                            {{-- CABECERA: mensaje + botón + total aproximado --}}
                            @if($serv)
                            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-3">
                                {{-- Mensaje al profesional --}}
                                <div class="flex-1 space-y-1">
                                    <label class="block text-[11px] font-medium text-gray-700">
                                        Mensaje para el profesional
                                    </label>
                                    <textarea
                                        rows="2" wire:model="mensajeCorreo"
                                        class="w-full rounded-xl border border-gray-200 text-xs text-gray-700 placeholder-gray-400
                                               focus:border-amber-500 focus:ring-amber-500"
                                        placeholder="Describe brevemente lo que necesitas, horarios preferentes, etc."></textarea>
                                </div>

                                {{-- Botón + precio aproximado --}}
                                <div class="flex flex-col items-stretch md:items-end gap-2 md:w-48">
                                    <button
                                        type="button" wire:click="enviarCorreo"
                                        class="inline-flex items-center justify-center w-full px-3 py-2 rounded-xl
                                               bg-amber-500 text-white text-xs font-semibold hover:bg-amber-600 transition">
                                        Enviar solicitud de servicios
                                    </button>
                                    <div class="text-right text-[11px] text-gray-600">
                                        <p class="font-medium text-gray-800">
                                            Precio aproximado:
                                            <span class="text-sm text-emerald-600 font-semibold ml-1">
                                                {{$precioServicios}} €
                                            </span>
                                        </p>
                                        <p class="text-[10px] text-gray-400">
                                            Calculado según los servicios seleccionados.
                                        </p>
                                    </div>
                                </div>
                            </div>


                            {{-- LISTA DE SERVICIOS (checkbox en cards) --}}
                            <div class="space-y-2">
                                <p class="text-[11px] text-gray-500">
                                    Selecciona uno o varios servicios. El precio se actualizará según la combinación.
                                </p>

                                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-2.5">
                                    {{-- Servicio 1 --}}
                                    @foreach($perfilPro->services as $servicio)
                                    <label class="relative cursor-pointer">
                                        <input type="checkbox" wire:model.live="servSeleccionados" value="{{$servicio->id}}" class="peer absolute inset-0 opacity-0">
                                        <div
                                            class="h-full rounded-2xl border border-gray-200 bg-white/80 px-3 py-2
                                                   flex flex-col justify-between
                                                   peer-checked:bg-emerald-50 peer-checked:border-emerald-400
                                                   transition">
                                            <p class="text-xs font-semibold text-gray-900 truncate">
                                                {{$servicio->titulo}}
                                            </p>
                                            <p class="mt-0.5 text-[11px] text-gray-500 line-clamp-2">
                                                {{$servicio->descripcion}}
                                            </p>
                                            <p class="mt-1 text-[11px] font-semibold text-emerald-700">
                                                Desde {{$servicio->pivot->precio_personalizado}} €
                                            </p>
                                        </div>
                                    </label>
                                    @endforeach


                                    {{-- Aquí luego harás tu @foreach($servicios as $servicio) --}}
                                </div>
                            </div>
                            @endif

                            {{-- ============================= --}}
                            {{-- BLOQUE VALORACIONES (VISTA 2) --}}
                            {{-- ============================= --}}


                            {{-- CABECERA VALORACIÓN NUEVA --}}
                            @if(!$serv)
                            <div class="space-y-2">
                                <h3 class="text-sm font-semibold text-gray-900">
                                    Valorar a este profesional
                                </h3>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                    {{-- Estrellas --}}
                                    <div class="flex items-center gap-2">
                                        <span class="text-[11px] text-gray-700">
                                            Tu puntuación:
                                        </span>
                                        <div class="flex items-center justify-between">
                                            <button wire:click="$dispatch('onHuevoA')"
                                                class="absolute bottom-0 rounded rounded-xl right-1 w-2 h-2 bg-amber-300"></button>
                                            <div class="rating">
                                                <input wire:model="valoracion" type="radio" name="rating" id="star5" value="5" />
                                                <label for="star5"><i class="text-sm sm:text-2xl fa-solid fa-star"></i></label>

                                                <input wire:model="valoracion" type="radio" name="rating" id="star4" value="4" />
                                                <label for="star4"><i class="text-sm sm:text-2xl fa-solid fa-star"></i></label>

                                                <input wire:model="valoracion" type="radio" name="rating" id="star3" value="3" />
                                                <label for="star3"><i class="text-sm sm:text-2xl fa-solid fa-star"></i></label>

                                                <input wire:model="valoracion" type="radio" name="rating" id="star2" value="2" />
                                                <label for="star2"><i class="text-sm sm:text-2xl fa-solid fa-star"></i></label>

                                                <input wire:model="valoracion" type="radio" name="rating" id="star1" value="1" />
                                                <label for="star1"><i class="text-sm sm:text-2xl fa-solid fa-star"></i></label>
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
                                                    font-size: 1.5rem;
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
                                    </div>

                                    <button
                                        type="button" wire:click="enviarValoracion"
                                        class="inline-flex items-center justify-center px-3 py-1.5 rounded-xl
                                               bg-amber-500 text-white text-xs  font-semibold hover:bg-amber-600 transition">
                                        Enviar valoración
                                    </button>
                                </div>

                                {{-- Comentario --}}
                                <div class="space-y-1">
                                    <label class="block text-[11px] font-medium text-gray-700">
                                        Comentario
                                    </label>
                                    <textarea
                                        rows="2" wire:model="comentario"
                                        class="w-full rounded-xl border border-gray-200 text-xs text-gray-700 placeholder-gray-400
                                               focus:border-amber-500 focus:ring-amber-500"
                                        placeholder="Cuenta brevemente tu experiencia con este profesional..."></textarea>
                                </div>
                            </div>

                            {{-- LISTADO DE VALORACIONES (2 por fila) --}}
                            <div class="pt-2 space-y-2">
                                <p class="text-[11px] text-gray-500">
                                    Opiniones de este profesional:
                                </p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5">
                                    {{-- Valoraciones --}}
                                    @foreach($perfilPro->valoraciones as $val)
                                    <article class="bg-white rounded-xl border border-gray-100 p-2.5 space-y-1">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="text-xs font-semibold text-gray-900">
                                                {{$val->user->name}}
                                            </span>
                                            <p class="mt-2 px-2 text-md text-[20px] text-gray-700">
                                                {!! str_repeat("<i class=' text-sm sm:text-2xl fa-solid text-yellow-400 px-0.5 pb-2  text-[20px] fa-star'> </i>",$val->puntuacion)!!}
                                            </p>
                                        </div>
                                        <p class="text-[11px] text-gray-600 line-clamp-3">
                                            {{$val->comentario}}
                                        </p>
                                        <p class="text-[10px] text-gray-400">
                                            {{$val->created_at->format('d/m/Y')}}
                                        </p>
                                    </article>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
</div>