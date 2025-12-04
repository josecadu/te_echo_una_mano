<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4 sm:p-6 space-y-4">

    {{-- TÍTULO + BUSCADOR INVITADO --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-lg font-semibold text-gray-900">
                Profesionales destacados
            </h2>
            <p class="text-xs text-gray-500 mt-0.5">
                Elige el profesional que mejor encaje contigo.
            </p>
        </div>

        @guest
        <div class="w-full sm:w-72">
            <x-input
                class="w-full text-sm border-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                type="text"
                wire:model.live="direccion"
                placeholder="Introduce tu dirección" />
            <p class="mt-1 text-[11px] text-gray-400">
                Usamos tu dirección solo para calcular la distancia.
            </p>
        </div>
        @endguest
    </div>

    @php
    $user = Auth::user(); // puede ser null
    @endphp

    {{-- CABECERA --}}
    <div
        class="hidden sm:flex items-center text-[11px] font-semibold text-gray-600
               px-3 py-1 rounded-xl bg-gray-50 border border-gray-200">
        <span class="w-12">Foto</span>
        <span class="w-32">Nombre</span>

        @auth
        <span class="flex-1">Contacto</span>
        @endauth

        <span class="w-32 text-center">Oficio</span>
        <span class="w-20 text-right">Distancia</span>
    </div>

    {{-- LISTA DE PROFESIONALES --}}
    <div class="space-y-2">
        @forelse ($profesionales as $profesional)
        @php
        $prof = $profesional->user;
        $d = null;
        @endphp

        @guest
        @if ($prof && $ubicacion && $ubicacion['lat'] && $ubicacion['lng'])
        @php
        $d = $prof->distanciar($ubicacion);
        @endphp
        @endif
        @else
        @if ($user && $prof)
        @php
        $d = $user->distanciar($prof);
        @endphp
        @endif
        @endguest

        {{-- CARD CLICABLE --}}
        <a href="{{ route('perfil.profesional', ['id' => $profesional->id]) }}"
            class="flex items-center gap-3 sm:gap-4 px-3 py-2.5 rounded-2xl
           border border-gray-100 bg-white relative group
           hover:bg-amber-200 hover:border-indigo-100 hover:shadow
           transition-all duration-150 ease-out">

            {{-- TODO el contenido clickable excepto el botón --}}

            <div class="flex flex-1 items-center gap-3 cursor-deafult">

                {{-- FOTO --}}
                <div class="w-11 h-11 sm:w-12 sm:h-12 flex-shrink-0 flex items-center justify-center
                    bg-gray-100 rounded-xl overflow-hidden ring-1 ring-gray-200">
                    <img
                        src="{{ Storage::url($profesional->foto_perfil) }}"
                        class="w-full h-full object-cover"
                        alt="Foto de {{ $prof->name ?? 'Sin usuario' }}">
                </div>

                {{-- BLOQUE CENTRAL (igual que antes, sin cambios) --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2">
                        <p class="text-sm font-semibold text-gray-900 truncate">
                            {{ $prof->name ?? 'Sin usuario' }}
                        </p>

                        {{-- Distancia móvil --}}
                        <div class="sm:hidden">
                            @if (is_null($d))
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] text-gray-400 bg-gray-50 border border-gray-200">
                                Sin datos
                            </span>
                            @else
                            @if ($d < 1)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium text-emerald-700 bg-emerald-50 border border-emerald-100">
                                {{ round($d * 1000) }} m
                                </span>
                                @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium text-emerald-700 bg-emerald-50 border border-emerald-100">
                                    {{ number_format($d, 1) }} km
                                </span>
                                @endif
                                @endif
                        </div>
                    </div>

                    @auth
                    <div class="mt-0.5 flex flex-wrap items-center gap-x-3 gap-y-0.5 text-[11px] text-gray-500">
                        <span class="truncate">{{ $prof->email ?? '-' }}</span>
                        <span class="hidden sm:inline text-gray-300">•</span>
                        <span class="hidden sm:inline truncate max-w-[200px]">
                            {{ $prof->direccion ?? '-' }}
                        </span>
                    </div>
                    @endauth

                    @guest
                    <p class="mt-0.5 text-[11px] text-gray-500">
                        {{ $profesional->oficio ?? '-' }}
                    </p>
                    @endguest
                </div>

                {{-- OFICIO (ESCRITORIO) --}}
                <div class="hidden sm:flex w-32 justify-center">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full
                        bg-indigo-50 text-[11px] font-semibold text-indigo-700
                        border border-indigo-100 truncate max-w-[8rem]">
                        {{ $profesional->oficio ?? 'Sin definir' }}
                    </span>
                </div>

                {{-- DISTANCIA --}}
                <div class="hidden sm:flex w-20 justify-end">
                    @if (is_null($d))
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-[11px] text-gray-400 bg-gray-50 border border-gray-200">
                        Sin datos
                    </span>
                    @else
                    @if ($d < 1)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-[11px] font-medium text-emerald-700 bg-emerald-50 border border-emerald-100">
                        {{ round($d * 1000) }} m
                        </span>
                        @else
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-[11px] font-medium text-emerald-700 bg-emerald-50 border border-emerald-100">
                            {{ number_format($d, 1) }} km
                        </span>
                        @endif
                        @endif
                </div>
            </div>


            {{-- 🔵 BOTÓN NUEVO: "Ver perfil" --}}
            <a href="{{ route('perfil.profesional', ['id' => $profesional->id]) }}"
                class="absolute right-2 top-1/2 -translate-y-1/2
              px-2.5 py-1 text-[20px] font-medium rounded-xl
              bg-indigo-600 text-white hover:bg-indigo-700
              opacity-0 group-hover:opacity-100 transition-opacity duration-150"
                onclick="event.stopPropagation()">

                
            </a>
        </a>



        @empty
        <p class="text-sm text-gray-500 px-3 py-4 bg-gray-50 rounded-xl text-center">
            No hay profesionales registrados.
        </p>
        @endforelse
    </div>


    {{-- PAGINACIÓN --}}
    <div class="mt-3">
        {{ $profesionales->links() }}
    </div>

    {{-- Modal login --}}
    <x-dialog-modal wire:model="loginModal">
        <x-slot name="title">
            Iniciar sesión
        </x-slot>

        <x-slot name="content">
            <x-mios.login />
        </x-slot>

        <x-slot name="footer">
            {{-- Botones opcionales --}}
        </x-slot>
    </x-dialog-modal>

    {{-- Modal registro --}}
    <x-dialog-modal wire:model="registerModal">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <livewire:registrar-user />
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-dialog-modal>

    {{-- Modal info profesional + valoración (pendiente) --}}

</div>