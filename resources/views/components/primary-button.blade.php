@props([
    'href' => null,
    'type' => 'button',
])

@if($href)
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 rounded-xl font-semibold text-sm bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg shadow-indigo-500/25 transition-all duration-200 hover:-translate-y-0.5 px-6 py-3 ']) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 rounded-xl font-semibold text-sm bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg shadow-indigo-500/25 transition-all duration-200 hover:-translate-y-0.5 px-6 py-3']) }}>
        {{ $slot }}
    </button>
@endif
