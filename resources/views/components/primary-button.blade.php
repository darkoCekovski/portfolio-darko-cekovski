@props([
    'href'    => null,
    'type'    => 'button',
    'variant' => 'primary',
])

@php
    $classes = match($variant) {
        'white'   => 'inline-flex items-center gap-2 px-8 py-3.5 rounded-xl font-semibold text-sm bg-white text-indigo-600 hover:bg-indigo-50 shadow-xl shadow-black/20 transition-all duration-200 hover:-translate-y-0.5',
        default   => 'inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold text-sm bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg shadow-indigo-500/25 transition-all duration-200 hover:-translate-y-0.5',
    };
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
