
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md px-8 py-6 space-y-6">

        {{-- Mensaje de éxito --}}
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 text-sm px-4 py-2 rounded">
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
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
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
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
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
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
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
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Repite la contraseña" />
            </div>

            {{-- Dirección --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Dirección
                </label>
                <input type="text" wire:model="direccion"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ej: Calle Mayor 12, Sevilla" />
                @error('direccion')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botón --}}
            <div class="pt-2">
                <button type="submit"
                    class="w-full inline-flex justify-center items-center rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2.5 transition">
                    Registrarse
                </button>
            </div>
        </form>

        <div class="text-center text-xs text-gray-500">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                Inicia sesión
            </a>
        </div>
    </div>

