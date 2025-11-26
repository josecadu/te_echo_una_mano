<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Servicios que ofreces</h2>
            <p class="text-sm text-gray-500">
                Ajusta tu precio personalizado para cada servicio.
            </p>
        </div>

        <button
        @if(!$serviciosDisponibles->count()) disabled 
        @endif
            type="button" wire:click='openAddServiceModal'
            class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-black shadow"
            title="Añadir servicio">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 5a1 1 0 0 1 1 1v5h5a1 1 0 1 1 0 2h-5v5a1 1 0 1 1-2 0v-5H6a1 1 0 1 1 0-2h5V6a1 1 0 0 1 1-1z" />
            </svg>
            @if(!$serviciosDisponibles->count())
                No hay servicios disponibles
            @else   
            Añadir servicio
            @endif
        </button>
    </div>
    <x-dialog-modal wire:model='addServiceModal'>
        <x-slot name='title'></x-slot>
        <x-slot name='content'>
            <form wire:submit.prevent="addService" class="space-y-3">

    {{-- SELECCIONAR SERVICIO --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Añadir servicio
        </label>

        <select wire:model="service_id"
                class="w-full rounded-lg border-gray-300 text-sm">
                @if(!$serviciosDisponibles->count())
                <option value="">No hay servicios disponibles</option>
            @else
            <option value="">-- Selecciona un servicio --</option>
            @endif

            @foreach($serviciosDisponibles as $service)
                <option value="{{ $service->id }}">
                    {{ $service->familia_Profesional }} - {{ $service->titulo }}
                </option>
            @endforeach
        </select>

        @error('service_id')
            <span class="text-xs text-red-600">{{ $message }}</span>
        @enderror
    </div>

    {{-- PRECIO PERSONALIZADO --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Precio personalizado (€)
        </label>
        <input type="number" step="0.01"
               wire:model="precio"
               class="w-full rounded-lg border-gray-300 text-sm">
        @error('precio')
            <span class="text-xs text-red-600">{{ $message }}</span>
        @enderror
    </div>

    {{-- BOTÓN --}}
    <div class="flex justify-end">
        <button type="submit"
                class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700">
            Añadir servicio
        </button>
    </div>

</form>

        </x-slot>
        <x-slot name='footer'></x-slot>

    </x-dialog-modal>


    {{-- Cabecera tipo tabla --}}
    <div class="mt-6 hidden md:grid grid-cols-12 gap-3 text-xs font-semibold text-gray-600 uppercase px-3">
        <div class="col-span-7">Servicio</div>
        <div class="col-span-3">Tu precio</div>
        <div class="col-span-2 text-right">Acción</div>
    </div>

    {{-- Filas de servicios --}}
    <div class="mt-3 space-y-2">

        {{-- Fila --}}
        @foreach($serviciosAsignados as $servicio)
        <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center bg-gray-50 border border-gray-200 rounded-xl p-3">
            <div class="md:col-span-7">
                <p class="font-semibold text-gray-900">{{ $servicio->titulo }}</p>
                <p class="text-xs text-gray-500">{{$servicio->descripcion}}</p>
            </div>

            <div class="md:col-span-2">
                <div class="relative">
                    <input
                        type="text"
                        class="w-full rounded-lg border-gray-300 text-sm focus:border-amber-500 focus:ring-amber-500 pr-10"
                        placeholder="{{$servicio->pivot->precio_personalizado}}" />
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-gray-500">€</span>
                </div>
            </div>
            

            <div class="md:col-span-3 md:text-right">
                
                <button
                    type="button"
                    class="w-full md:w-auto px-3 py-2 rounded-lg bg-amber-500 text-white text-xs font-semibold hover:bg-amber-600">
                    Guardar
                </button>
                <button
                    type="button"
                    class="w-full md:w-auto px-3 py-2 rounded-lg bg-red-600 text-white text-xs font-semibold hover:bg-red-700">
                    Borrar
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>