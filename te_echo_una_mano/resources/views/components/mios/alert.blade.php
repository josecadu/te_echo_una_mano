<div>
    {{-- SUCCESS --}}
    @if (session('success'))
        <div
            x-data="{ shown: true }"
            x-init="setTimeout(() => shown = false, 2500)"
            x-show.transition.out.opacity.duration.600ms="shown"
            style="display: none;"
            class="bg-green-500 text-white px-4 py-2 text-sm rounded-md mb-4"
        >
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR --}}
    @if (session('error'))
        <div
            x-data="{ shown: true }"
            x-init="setTimeout(() => shown = false, 2500)"
            x-show.transition.out.opacity.duration.600ms="shown"
            style="display: none;"
            class="bg-red-500 text-white px-4 py-2 text-sm rounded-md mb-4"
        >
            {{ session('error') }}
        </div>
    @endif

    {{-- WARNING --}}
    @if (session('warning'))
        <div
            x-data="{ shown: true }"
            x-init="setTimeout(() => shown = false, 2500)"
            x-show.transition.out.opacity.duration.600ms="shown"
            style="display: none;"
            class="bg-yellow-500 text-black px-4 py-2 text-sm rounded-md mb-4"
        >
            {{ session('warning') }}
        </div>
    @endif

    {{-- INFO --}}
    @if (session('info'))
        <div
            x-data="{ shown: true }"
            x-init="setTimeout(() => shown = false, 2500)"
            x-show.transition.out.opacity.duration.600ms="shown"
            style="display: none;"
            class="bg-blue-500 text-white px-4 py-2 text-sm rounded-md mb-4"
        >
            {{ session('info') }}
        </div>
    @
    
    
</div>
