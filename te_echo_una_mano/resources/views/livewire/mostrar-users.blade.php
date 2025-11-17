<div class="space-y-4" x-data
    @confirmar-eliminar.window="
        if (confirm('¿Seguro que quieres eliminar este usuario?')) {
            $wire.delete($event.detail.id)
        }
     ">

    {{-- Encabezado --}}
    <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900"></h2>
    </div>
    <div class="container mx-auto px-3 sm:px-4 lg:px-5">
        {{-- Grid de usuarios --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
            @forelse ($users as $user)
            <div wire:key="user-{{ $user->id }}" class="rounded-2xl bg-green-200 border border-black p-4 bg-white hover:shadow-xl transition">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $user->email }}</p>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-1">
                            {{ $user->direccion ?? 'Sin dirección' }}
                        </p>
                    </div>

                    {{-- Rol del usuario --}}
                    <span class="text-sm font-medium text-gray-800">
                        {{ ucfirst($user->role) }}
                    </span>

                </div>


                {{-- Botones de acción --}}
                <div class="mt-4 flex justify-end items-center gap-5">
                    {{-- Botón editar --}}
                    <button type="button" wire:click="edit({{ $user->id }})"
                        class="inline-flex items-center rounded-lg border border-gray-300 px-3 py-1.5 text-gray-700 hover:bg-gray-50 text-sm font-medium"
                        title="Editar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-width="1.5" d="M16.862 3.487a1.875 1.875 0 112.651 2.651L7.5 18.151l-3 .349.349-3L16.862 3.487z" />
                        </svg>
                        Editar
                    </button>

                    {{-- Botón eliminar --}}
                    <button type="button" wire:click="confirmarDelete({{ $user->id }})"
                        class="inline-flex items-center rounded-lg border border-red-300 text-red-600 px-3 py-1.5 hover:bg-red-50 text-sm font-medium"
                        title="Eliminar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-width="1.5" d="M6 7h12M9.75 7V5.25A1.5 1.5 0 0111.25 3.75h1.5A1.5 1.5 0 0114.25 5.25V7M8.25 7v12a1.5 1.5 0 001.5 1.5h4.5a1.5 1.5 0 001.5-1.5V7" />
                        </svg>
                        Eliminar
                    </button>
                </div>

            </div>
            @empty
            <div class="col-span-full text-sm text-gray-500 text-center py-6">
                No hay usuarios.
            </div>
            @endforelse
        </div>
    </div>

    {{-- Paginación --}}
    <div>
        {{ $users->links() }}
    </div>

    {{-- Modal de edición --}}
    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
            Editar usuario
        </x-slot>

        <x-slot name="content">
            <div class="space-y-4">
                <div>
                    <x-label value="Nombre" />
                    <x-input type="text" class="w-full" wire:model.defer="name" />
                    @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <x-label value="Email" />
                    <x-input type="email" class="w-full" wire:model.defer="email" />
                    @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <x-label value="Dirección" />
                    <x-input type="text" class="w-full" wire:model.defer="direccion" />
                    @error('direccion') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <x-label value="Rol" />
                    <select class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        wire:model.defer="role">
                        <option value="guest">guest</option>
                        <option value="usuario">usuario</option>
                        <option value="profesional">profesional</option>
                        <option value="admin">admin</option>
                    </select>
                    @error('role') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('modal', false)">Cancelar</x-secondary-button>
            <x-button class="ml-2" wire:click="update">Guardar</x-button>
        </x-slot>
    </x-dialog-modal>

</div>