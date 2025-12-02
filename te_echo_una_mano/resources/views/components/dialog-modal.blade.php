@props(['id' => null, 'maxWidth' => '3xl'])

<x-modal  :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-4 bg-amber-200  py-2">
        <div class="text-lg font-medium text-gray-900">
            {{ $title }}
        </div>

        <div class="mt-1 text-sm text-gray-600">
            {{ $content }}
        </div>
        <div class="px-4 py-3 text-right">
            {{ $footer }}
        </div>
    </div>

    
</x-modal>
