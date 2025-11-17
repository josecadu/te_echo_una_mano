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
</form>