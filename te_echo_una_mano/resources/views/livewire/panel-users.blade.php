<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

    <!-- Recuadro grande izquierda -->
    
        <livewire:mostrar-profesionales />
    

    <!-- Contenedor para los dos recuadros pequeños a la derecha -->
    <div class="grid grid-cols-1 gap-6 h-full">

        <!-- Recuadro pequeño superior -->
        <div class="bg-white p-6 rounded-lg shadow-md h-full">
            <!-- Contenido a tu gusto -->
             @guest
            <div class="hidden sm:flex sm:items-center ml-auto">
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-white  border border-black rounded-2xl bg-yellow-700  hover:bg-gray-300 transition">
                    {{ __('ENTRAR') }}
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ms-4 px-4 py-2 border border-black text-gray-800 rounded-2xl bg-yellow-300 hover:bg-yellow-400 transition">
                    {{ __('REGISTRARSE') }}
                </a>
                @endif
            </div>
            @endguest
        </div>

        <!-- Recuadro pequeño inferior -->
        <div class="bg-white p-6 rounded-lg shadow-md h-full">
            <!-- Contenido a tu gusto -->
        </div>

    </div>
</div>