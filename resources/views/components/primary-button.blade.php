@props([
    'href'    => null,
    'type'    => 'button',
    'variant' => 'primary',
    'size'    => 'md',
])

@php
    $classes = match(true) {
        $variant === 'white' => 'inline-flex items-center gap-2 h-12 px-8 rounded-xl font-semibold text-sm bg-white text-indigo-600 hover:bg-indigo-50 shadow-xl shadow-black/20 transition-all duration-200 hover:-translate-y-0.5',
        $size === 'sm'       => 'inline-flex items-center gap-2 h-10 px-5 rounded-xl font-semibold text-sm bg-indigo-600 hover:bg-indigo-700 text-white shadow-sm shadow-indigo-500/20 transition-all duration-200',
        default              => 'inline-flex items-center gap-2 h-11 px-6 rounded-xl font-semibold text-sm bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg shadow-indigo-500/25 transition-all duration-200 hover:-translate-y-0.5',
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
