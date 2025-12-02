<div class="w-full flex flex-col items-center mt-4">

    {{-- TÍTULO ARRIBA DEL TODO --}}
    <h1 class="text-3xl md:text-4xl font-serif italic text-amber-800 drop-shadow-sm text-center mb-2">
        TE ECHO UNA MANO
    </h1>

    {{-- SUBTÍTULO (opcional) --}}
    <p class="text-sm md:text-base text-gray-800/90 text-center mb-6">
        Conecta con profesionales de confianza cerca de ti
    </p>

    @if (Route::has('login'))
        {{-- NAV DE BOTONES CENTRADOS --}}
        <nav class="flex flex-col items-center gap-4 text-center mt-2">

            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="px-6 py-2 text-white border border-white/80 rounded-full hover:bg-white/20 transition">
                    Ir al panel
                </a>

            @else

                {{-- Entrar + Registro --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <x-button class="hover:bg-amber-600" wire:click="$set('loginModal', true)">
                        Entrar
                    </x-button>

                    @if (Route::has('register'))
                        <x-button class="hover:bg-amber-600" wire:click="$set('registerModal', true)">
                            Registro
                        </x-button>
                    @endif
                </div>

                {{-- Separador + invitado --}}
                <div class="text-gray-800 text-sm text-center">
                    <span class="block mb-1 mt-1">o</span>

                    <a
                        href="{{ url('/dashboard') }}"
                        class="px-6 py-2 text-cyan-800 font-medium rounded-full hover:bg-white/20 transition">
                        Unirse como invitado
                    </a>
                </div>

            @endauth

        </nav>
    @endif

    {{-- MODALES --}}
    <x-dialog-modal wire:model="loginModal" maxWidth="sm">
        <x-slot name="title">Iniciar sesión</x-slot>
        <x-slot name="content"><x-mios.login/></x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="registerModal" maxWidth="md">
        <x-slot name="title"></x-slot>
        <x-slot name="content"><livewire:registrar-user/></x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>

</div>
