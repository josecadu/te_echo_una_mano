<div class="bg-white rounded-xl shadow-md p-3 space-y-3">
    <h2 class="text-lg font-semibold px-5 text-gray-900 mb-4">
        Profesionales destacados @guest <x-input class="mx-4" type="text" wire:model.live="direccion" placeholder="introduce tu direccion" /> @endguest
    </h2>

    @php
    $user = Auth::user(); // puede ser null
    @endphp

    {{-- Encabezado tipo tabla --}}
    <div class="flex items-center gap-5 font-semibold text-gray-700 px-3 text-xs border-b border-gray-300 pb-2">
        <span class="w-14">Foto</span>
        <span class="w-32">Nombre</span>

        @auth
        <span class="w-40">Email</span>
        <span class="w-40">Dirección</span>
        @endauth

        <span class="w-28">Oficio</span>
        <span class="w-20">Distancia</span>
    </div>

    {{-- Filas --}}
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


    <div class="flex items-center gap-5 border-b px-3 border-gray-100 py-3 last:border-none">
        {{-- FOTO --}}
        <div class="w-14">

            <img src="{{Storage::url($profesional->foto_perfil)}}" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">

        </div>

        {{-- Nombre --}}
        <p class="w-32 text-sm font-medium text-gray-900">
            {{ $prof->name ?? 'Sin usuario' }}
        </p>
        @auth
        {{-- Email --}}
        <p class="w-40 text-xs text-gray-600">
            {{ $prof->email ?? '-' }}
        </p>

        {{-- Dirección --}}
        <p class="w-40 text-xs text-gray-600">
            {{ $prof->direccion ?? '-' }}
        </p>
        @endauth

        {{-- Oficio --}}
        <p class="w-28 text-xs text-gray-500">
            {{ $profesional->oficio ?? '-' }}
        </p>

        {{-- Distancia --}}
        @if (is_null($d))
        <p class="w-20 text-xs text-gray-400">Sin datos</p>
        @else
        @if ($d < 1)
            <p class="w-20 text-xs text-gray-500">{{ round($d * 1000) }} m</p>
            @else
            <p class="w-20 text-xs text-gray-500">{{ number_format($d, 1) }} km</p>
            @endif
            @endif
    </div>

    @empty
    <p class="text-sm text-gray-500">No hay profesionales registrados.</p>
       {{-- DEBUG TEMPORAL --}}
 <pre>{{ $profesional->foto_perfil }}</pre> 
    @endforelse
 


    {{$profesionales->links()}}
    {{--modales--}}
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
    <x-dialog-modal wire:model="registerModal">
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">
            <livewire:registrar-user />
        </x-slot>


    </x-dialog-modal>
</div>