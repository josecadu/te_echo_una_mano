<div class="py-2 pt-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-gray-50">

                {{-- GRID PRINCIPAL --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- COLUMNA IZQUIERDA: CARD PERFIL --}}
                    <aside class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 sticky top-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-xl font-bold text-gray-900">Perfil profesional</h2>

                                {{-- Botón editar perfil --}}
                                <button
                                    type="button" wire:click="edit({{auth()->id()}})"
                                    
                                    class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-amber-500 text-white text-sm font-semibold hover:bg-amber-600 shadow"
                                    title="Editar perfil">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16.862 3.487a2.25 2.25 0 0 1 3.182 3.182L8.25 18.463 3 19.5l1.037-5.25L16.862 3.487z" />
                                    </svg>
                                    Editar
                                </button>
                            </div>

                            {{-- Foto + datos principales --}}
                            <div class="mt-6 flex flex-col items-center text-center">
                                <div class="w-32 h-32 rounded-full overflow-hidden ring-4 ring-amber-200 shadow">
                                    <img
                                        src="{{ Storage::url($perfilPro->profesional?->foto_perfil) }}"
                                        alt="Foto profesional"
                                        class="w-full h-full object-cover" />
                                </div>

                                <h3 class="mt-4 text-lg font-semibold text-gray-900">{{$perfilPro->name}}</h3>
                                <p class="text-sm text-gray-500">Oficio ({{$perfilPro->profesional?->oficio}})</p>

                                <div class="mt-5 w-full space-y-3 text-left">
                                    <div class="flex items-center justify-between bg-gray-50 rounded-lg p-3">
                                        <span class="text-sm text-gray-600">Email</span>
                                        <span class="text-sm font-medium text-gray-900">{{$perfilPro->email}}</span>
                                    </div>

                                    <div class="flex items-center justify-between bg-gray-50 rounded-lg p-3">
                                        <span class="text-sm text-gray-600">Dirección</span>
                                        <span class="text-sm font-medium text-gray-900">{{{$perfilPro->direccion}}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </aside>

                    {{-- MODAL EDITAR PERFIL --}}
                    <x-dialog-modal wire:model="editarModal" :closeOnBackdrop="false" :closeOnEscape="false">
                        <x-slot name="title">
                            Editar perfil profesional
                        </x-slot>

                        <x-slot name="content">
                            <form wire:submit.prevent="update" class="space-y-4">

    {{-- FOTO --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Foto de perfil</label>

        <img src="{{ Storage::url($fotoAntigua) }}"
            class="h-20 w-20 rounded-full object-cover mb-2">

        <input type="file"
            wire:model="fotoNueva"
            class="block w-full text-sm text-gray-700">

        @error('fotoNueva')
        <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>

    {{-- NOMBRE --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre</label>
        <input type="text"
            wire:model="name"
            class="w-full rounded-lg border-gray-300">
        @error('name')
        <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>

    {{-- EMAIL --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="text"
            wire:model="email"
            class="w-full rounded-lg border-gray-300">
        @error('email')
        <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>

    {{-- DIRECCIÓN --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Dirección</label>
        <input type="text"
            wire:model="direccion"
            class="w-full rounded-lg border-gray-300">
        @error('direccion')
        <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>

    {{-- BOTONES --}}
    <div class="flex justify-end gap-3 pt-3">
        <button type="button"
            wire:click="cancelar"
            class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">
            Cancelar
        </button>

        <button type="submit"
            class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
            Guardar cambios
        </button>
    </div>

</form>

                        </x-slot>

                        <x-slot name="footer">
                            {{-- Botones opcionales --}}
                        </x-slot>
                    </x-dialog-modal>

                    {{-- COLUMNA DERECHA --}}
                    <section class="lg:col-span-2 space-y-6">

                        {{-- CARD: SERVICIOS QUE OFRECES (SIN CHECKBOX) --}}
                        <livewire:card-servicios />



                        {{-- CARD VALORACIONES (2 POR FILA) --}}
                        <livewire:card-valoraciones />

                    </section>
                </div>
            </div>
        </div>
    </div>
</div>