<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

    {{-- CABECERA: TÍTULO + MEDIA --}}
    <div class="flex items-center ">

        {{-- TÍTULO + SUBTÍTULO --}}
        <div>
            <h2 class="text-xl font-bold text-gray-900">Valoraciones</h2>
            <p class="text-sm text-gray-500 leading-tight">
                Opiniones de clientes reales.
            </p>
        </div>

        {{-- MEDIA + ICONO --}}
        <div class="flex flex-col px-14 items-center">
            <div class="flex items-center gap-1 text-[30px] leading-none">
                <span>{{ $score }}</span>
                <i class="fa-solid fa-star text-yellow-400"></i>
                
            </div>
            <p class="text-[11px] text-gray-500 leading-none mt-1">
                ({{ $valoraciones }} valoraciones)
            </p>
        </div>

    </div>


    {{-- Lista en grid 2 por fila (mitad de ancho cada una) --}}
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Card valoración --}}
        @if ($valoraciones)
        @foreach($perfilPro->valoraciones  as $val )
        <div class="bg-gray-50 rounded-xl  p-3 border border-gray-200">
            <p class="mt-2 px-2 text-md text-[20px] text-gray-700">
            {!! str_repeat("<i class='fa-solid text-yellow-400 px-0.5 pb-2  text-[20px] fa-star'> </i>",$val->puntuacion)!!} 
            </p>
            <div class="flex items-center justify-between">
                {{$val->comentario}}
            </div>
            
        </div>
        @endforeach
        @else
        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
            Ningun usuario te ha valorado todavia
        </div>
        @endif



    </div>
</div>