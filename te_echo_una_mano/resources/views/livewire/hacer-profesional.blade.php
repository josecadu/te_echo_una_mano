
<form wire:submit.prevent="save" class="space-y-4">
        {{-- Oficio --}}
        <div>
            <x-label value="oficio" />
                    <select class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        wire:model.defer="oficio">
                        <option value="">- Selecciona tu oficio -</option>
                        @foreach($oficios as $oficio)
                            <option value="{{ $oficio }}">{{ $oficio }}</option>
                        @endforeach
                    </select>
            
            @error('oficio')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
         {{-- Foto_perfil --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Foto de Perfil
            </label>
            <input type="file"
       wire:model="fotoPerfil"
       accept="image/*"
       class="w-full rounded-2xl border bg-amber-100 border-gray-300 px-3 py-2 text-xs
              focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"


                placeholder="Tu foto de perfil" />
            @error('fotoPerfil')
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