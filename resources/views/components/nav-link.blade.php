@props([
    'href'    => '#',
    'active'  => false,
    'mobile'  => false,
    'dynamic' => false,
])

@php
    $activeClass = 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-500/10';

    if ($mobile) {
        $base     = 'block px-4 py-3 rounded-lg text-sm font-medium transition-colors';
        $inactive = 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-white/5';
    } else {
        $base     = 'relative px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200';
        $inactive = 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5';
    }

    // dynamic = no PHP state classes, Alpine handles it via :class
    $stateClass = $dynamic ? '' : ($active ? $activeClass : $inactive);
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => trim($base . ' ' . $stateClass)]) }}>
    {{ $slot }}
</a>
