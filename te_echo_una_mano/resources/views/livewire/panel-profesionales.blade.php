<div class="bg-transparent py-1 pt-6">
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
        <div class="bg-white/20 backdrop-blur-sm overflow-hidden sm:rounded-3xl">
            <div class="p-3 lg:p-4 bg-white/40">

                {{-- LAYOUT PRINCIPAL: PERFIL MUY COMPACTO IZQ + PANEL AMPLIO DCHA --}}
                <div class="flex flex-col lg:flex-row lg:items-start lg:gap-5">

                    {{-- COLUMNA IZQUIERDA: CARD PERFIL (más estrecha y compacta) --}}
                    <aside class="w-full lg:w-72 lg:flex-shrink-0 mb-6 lg:mb-0">
                        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4 sticky top-4">
                            <div class="flex items-center justify-between gap-2">
                                <h2 class="text-base font-bold text-gray-900">Perfil profesional</h2>

                                {{-- Botón editar perfil --}}
                                <button
                                    type="button"
                                    wire:click="edit({{auth()->id()}})"
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-amber-500 text-white text-xs font-semibold hover:bg-amber-600 shadow-sm"
                                    title="Editar perfil"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16.862 3.487a2.25 2.25 0 0 1 3.182 3.182L8.25 18.463 3 19.5l1.037-5.25L16.862 3.487z" />
                                    </svg>
                                    Editar
                                </button>
                            </div>

                            {{-- Foto + datos principales --}}
                            <div class="mt-4 flex flex-col items-center text-center">
                                <div class="w-24 h-24 rounded-full overflow-hidden ring-3 ring-amber-200 shadow">
                                    <img
                                        src="{{ Storage::url($perfilPro->profesional?->foto_perfil) }}"
                                        alt="Foto profesional"
                                        class="w-full h-full object-cover"
                                    />
                                </div>

                                <h3 class="mt-3 text-sm font-semibold text-gray-900">
                                    {{ $perfilPro->name }}
                                </h3>
                                <p class="text-xs text-gray-500">
                                    Oficio ({{ $perfilPro->profesional?->oficio }})
                                </p>

                                <div class="mt-3 w-full space-y-1.5 text-left text-xs">
                                    <div class="bg-gray-50 rounded-lg p-2">
                                        <span class="block text-[11px] text-gray-500">Email</span>
                                        <span class="block text-xs font-medium text-gray-900 break-all">
                                            {{ $perfilPro->email }}
                                        </span>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-2">
                                        <span class="block text-[11px] text-gray-500">Dirección</span>
                                        <span class="block text-xs font-medium text-gray-900">
                                            {{ $perfilPro->direccion }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>

                    {{-- MODAL EDITAR PERFIL --}}
                    <x-dialog-modal wire:model="editarModal" maxWidth="xs">
                        <x-slot name="title">
                            Editar perfil profesional
                        </x-slot>

                        <x-slot name="content">
                            <form wire:submit.prevent="update" class="space-y-4">

                                {{-- FOTO --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Foto de perfil</label>

                                    <img
                                        src="{{ Storage::url($fotoAntigua) }}"
                                        class="h-20 w-20 rounded-full object-cover mb-2"
                                    >

                                    <input
                                        type="file"
                                        wire:model="fotoNueva"
                                        class="block w-full text-sm text-gray-700"
                                    >

                                    @error('fotoNueva')
                                        <span class="text-red-600 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- NOMBRE --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre</label>
                                    <input
                                        type="text"
                                        wire:model="name"
                                        class="w-full rounded-lg border-gray-300 text-sm"
                                    >
                                    @error('name')
                                        <span class="text-red-600 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- EMAIL --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                                    <input
                                        type="text"
                                        wire:model="email"
                                        class="w-full rounded-lg border-gray-300 text-sm"
                                    >
                                    @error('email')
                                        <span class="text-red-600 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- DIRECCIÓN --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Dirección</label>
                                    <input
                                        type="text"
                                        wire:model="direccion"
                                        class="w-full rounded-lg border-gray-300 text-sm"
                                    >
                                    @error('direccion')
                                        <span class="text-red-600 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- BOTONES --}}
                                <div class="flex justify-end gap-3 pt-3">
                                    <button
                                        type="button"
                                        wire:click="cancelar"
                                        class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-sm"
                                    >
                                        Cancelar
                                    </button>

                                    <button
                                        type="submit"
                                        class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 text-sm"
                                    >
                                        Guardar cambios
                                    </button>
                                </div>

                            </form>
                        </x-slot>

                        <x-slot name="footer">
                            {{-- Botones opcionales --}}
                        </x-slot>
                    </x-dialog-modal>

                    {{-- COLUMNA DERECHA: MUCHO MÁS ANCHA PARA TUS BOTONES --}}
                    <section class="flex-1 space-y-5">

                        {{-- Aquí ahora tienes casi todo el ancho libre
                             para que en cada profesional metas 2 botones:
                             ⭐ media valoraciones + 📋 ver servicios --}}

                        <livewire:card-servicios />

                        <livewire:card-valoraciones />

                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
