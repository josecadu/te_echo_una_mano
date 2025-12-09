<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Leaflet CSS -->
    <link rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire styles -->
    @livewireStyles
    



</head>

<body class="font-sans antialiased min-h-screen bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('storage/images/logo3.png') }}');">

    <x-banner />

    <div class="min-h-screen bg-gray-100 bg-opacity-30 backdrop-blur-sm">
        @livewire('navigation-menu')

        @if (isset($header))
        <header class="bg-white shadow">
            {{-- cabecera opcional --}}
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        
    </div>
    <livewire:easter/>

    {{-- Modales de Jetstream/Livewire --}}
    @stack('modals')

    {{-- Livewire scripts --}}
    @livewireScripts

    {{-- Scripts que hace @push('scripts') desde las vistas --}}
    @stack('scripts')
    <script>
        document.addEventListener('livewire:init', () => {

            Livewire.on('alert', ({
                type = 'success',
                message = 'OK',
                check =  true,
            }) => {
                Swal.fire({
                    position: 'center',
                    icon: type,
                    title: message,
                    showConfirmButton:  check,
                    timer: 1800,
                    toast: true,
                    timerProgressBar: false,
                });
            });

        });
    </script>

<!-- Banner de Cookies -->
<div id="cookie-banner" 
     class="fixed bottom-0 inset-x-0 bg-gray-900 text-white text-sm p-4 
            flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 z-50
            shadow-lg transform translate-y-full transition-all duration-500">

    <p class="sm:max-w-xl">
        Utilizamos cookies propias para mejorar tu experiencia en la plataforma. 
        Al continuar navegando aceptas su uso.
    </p>

    <button id="cookie-accept"
        class="px-4 py-2 rounded-lg bg-amber-500 hover:bg-amber-600 font-semibold text-sm transition">
        Aceptar cookies
    </button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const banner = document.getElementById("cookie-banner");
        const btn = document.getElementById("cookie-accept");

        // Si NO está aceptado en localStorage → mostramos el banner
        if (!localStorage.getItem("cookies_aceptadas")) {
            setTimeout(() => {
                banner.classList.remove("translate-y-full");
            }, 200);
        }

        // Al hacer clic en aceptar
        btn.addEventListener("click", function () {
            // Guardamos en localStorage que ya se aceptó
            localStorage.setItem("cookies_aceptadas", "1");

            // Animación de salida
            banner.classList.add("translate-y-full");

            // Opcional: quitar del DOM tras la animación
            setTimeout(() => {
                banner.style.display = "none";
            }, 600);
        });
    });
</script>

</body>

</html>