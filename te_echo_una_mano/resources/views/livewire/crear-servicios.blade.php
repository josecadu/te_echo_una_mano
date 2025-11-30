<x-dialog-modal wire:model="modalServicio">
    <x-slot name="title">
        Crear nuevo servicio

    </x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="crearServicio" class="space-y-4">
            {{--titulo--}}
            <div>
                <x-label>Título</x-label>
                <x-input type="text" wire:model="titulo" class="w-full" />
                @error('titulo')
                <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            {{--familia_profesional
            <div>
                <x-label>Familia Profesional</x-label>
                <select class="w-full" wire:model="familia_profesional">
                    <option value="">--familia profesional--</option>
                    @foreach($familiasProfesionales as $familia)
                    <option value="{{ $familia }}">{{ $familia }}</option>
                    @endforeach
                </select>
                @error('familia_profesional')
                <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>    fin comentario--}}
            {{--descripcion--}}
            <div>
                <x-label>Descripcion</x-label>
                <textarea type="textarea" wire:model="descripcion" rows="3" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                @error('descripcion')
                <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            {{--precio_personalizado--}}
            <div>
                <x-label>Precio (€)</x-label>
                <x-input type="number" step="5" wire:model="precio_personalizado" class="w-full" />
                @error('precio_personalizado')
                <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{--crear--}}
            <div class="flex justify-end">

                {{--cerrar--}}
                <button type="button"
                    class="mt-4 px-4 py-2 bg-red-600 font-bold text-white rounded-lg hover:bg-red-700"
                    wire:click="$dispatch('cerrarModalServicio')">
                    Cerrar
                </button>

                <button type="submit"
                    class=" mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Crear servicio
                </button>


            </div>


        </form>
    </x-slot>
    <x-slot name="footer">
    </x-slot>
</x-dialog-modal>