<div >

    {{-- Mensaje de éxito --}}
    @if (session()->has('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm px-4 py-2 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-center space-y-1">
        <h1 class="text-2xl font-semibold text-gray-900">Crear cuenta</h1>
        <p class="text-sm text-gray-500">
            Regístrate para poder solicitar servicios a los profesionales.
        </p>
    </div>

    <form wire:submit.prevent="save" class="space-y-4">
        {{-- Nombre --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nombre
            </label>
            <input type="text" wire:model="name"
                class="w-full rounded-lg border bg-amber-100 border-gray-300 px-3 py-2 text-xs
                       focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                placeholder="Tu nombre" />
            @error('name')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Correo electrónico
            </label>
            <input type="email" wire:model="email"
                class="w-full rounded-lg border bg-amber-100 border-gray-300 px-3 py-2 text-xs
                       focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                placeholder="tucorreo@example.com" />
            @error('email')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Contraseña --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Contraseña
            </label>
            <input type="password" wire:model="password"
                class="w-full rounded-lg border bg-amber-100 border-gray-300 px-3 py-2 text-xs
                       focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                placeholder="Mínimo 6 caracteres" />
            @error('password')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirmación --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Confirmar contraseña
            </label>
            <input type="password" wire:model="password_confirmation"
                class="w-full rounded-lg border bg-amber-100 border-gray-300 px-3 py-2 text-xs
                       focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                placeholder="Repite la contraseña" />
        </div>

        {{-- Dirección --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Dirección
            </label>
            <input type="text" wire:model="direccion"
                class="w-full rounded-lg border bg-amber-100 border-gray-300 px-3 py-2 text-xs
                       focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                placeholder="Ej: Calle Mayor 12, Sevilla" />
            @error('direccion')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botón --}}
        <div class="py-3">
            <button type="submit"
                class="w-full inline-flex justify-center items-center rounded-full
                       bg-amber-500 hover:bg-amber-600 text-gray-900 text-sm font-semibold
                       px-4 py-2.5 shadow-sm transition">
                Registrarse
            </button>
        </div>
    </form>
</div>
