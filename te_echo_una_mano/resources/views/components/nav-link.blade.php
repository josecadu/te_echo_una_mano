@props(['active', 'icon' => null])

@php
$baseClasses = 'relative inline-flex items-center gap-2 px-5 py-2.5 
                 tracking-wide transition-all duration-200 select-none
                text-[22px]';

$classes = ($active ?? false)
    ? "$baseClasses bg-white/80 text-gray-900 shadow-md"
    : "$baseClasses text-white/90 hover:bg-white/20 hover:text-white";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    
    {{-- ICONO --}}
    @if($icon)
        <x-dynamic-component 
            :component="'heroicon-o-' . $icon" 
            class="w-5 h-5"
        />
    @endif

    {{-- TEXTO --}}
    <span class="font-inter">{{ $slot }}</span>

    {{-- Indicador activo --}}
    @if($active)
        <span class="absolute inset-x-4 -bottom-1 h-1 bg-white rounded-full"></span>
    @endif

</a>
