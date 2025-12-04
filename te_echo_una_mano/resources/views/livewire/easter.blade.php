<!-- resources/views/livewire/easter.blade.php -->

<div>
    @if($logoHuevo)
  <i class="fa-solid fa-egg text-yellow-300 text-4xl
           absolute top-[12px] right-[190px] z-50
           transition-transform duration-200 hover:scale-110"
   style="filter:
            drop-shadow(0 0 6px rgba(255, 215, 0, 0.8))
            drop-shadow(0 0 12px rgba(255, 200, 0, 0.5))
            drop-shadow(0 0 20px rgba(255, 180, 0, 0.3));
   ">

</i>
@endif

<x-dialog-modal wire:model="showModal" maxWidth="sm">
        
        <x-slot name="title">
            <div class="text-center text-2xl font-bold">
                🥚 Huevo de Pascua Encontrado
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="text-center text-gray-700 space-y-3 leading-relaxed">
                <p>
                    Has desbloqueado un mensaje oculto del creador.
                </p>

                <p class="font-medium">
                    Saludos del programador  
                    <span class="font-bold text-indigo-600">Jose Manuel Cabrera</span>
                </p>

                <p class="italic text-sm text-gray-600">
                    Gracias por usar <span class="font-semibold">"Te echo una mano"</span>
                </p>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="w-full text-center">
                <x-secondary-button 
                    wire:click="$set('showModal', false)"
                    class="px-4 py-2 rounded-lg hover:bg-gray-200 transition"
                >
                    Cerrar
                </x-secondary-button>
            </div>
        </x-slot>

    </x-dialog-modal>
</div>
