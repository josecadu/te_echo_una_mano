
<div>

    {{-- aquí dentro va el nav con los botones --}}

    @if (Route::has('login'))
    <nav class="flex flex-col gap-4 items-center text-center">
        @auth

        <a
            href="{{ url('/dashboard') }}"
            class="px-6 py-2 text-white border border-white/70 rounded-full hover:bg-white/20 transition">
            
        </a>
        @else

            <x-button class="ml-7 hover:bg-amber-600" wire:click="$set('loginModal', true)">Entrar</x-button>

        @if (Route::has('register'))
        
            <x-button class="ml-7 hover:bg-amber-600" wire:click="$set('registerModal', true)">REGISTRO</x-button>
        
        @endif
        <span class="ml-7 text-black mt-4 my-1">o</span>

        <a
            href="{{ url('/dashboard') }}"
            class="px-6 py-2 ml-7 text-cyan-700  rounded-full hover:bg-white/20 transition">
            Unirse como invitado
        </a>
        @endauth

    </nav>
    @endif
    <x-dialog-modal wire:model="loginModal">
        <x-slot name="title">
            Iniciar sesión
        </x-slot>

        <x-slot name="content">
            <x-mios.login/>
        </x-slot>

        <x-slot name="footer">
            {{-- Botones opcionales --}}
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model="registerModal">
        <x-slot name="title">
            
        </x-slot>

        <x-slot name="content">
            <livewire:registrar-user/>
        </x-slot>
        <x-slot name="footer">

        </x-slot>

    
    </x-dialog-modal>
</div>

