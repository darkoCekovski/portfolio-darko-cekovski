@props([
    'href' => null,
    'type' => 'button',
])

@if($href)
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 h-11 px-6 rounded-xl font-semibold text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-slate-300 hover:border-primary-300 dark:hover:border-primary-500/50 transition-all duration-200 hover:-translate-y-0.5 shadow-sm']) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 h-11 px-6 rounded-xl font-semibold text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-slate-300 hover:border-primary-300 dark:hover:border-primary-500/50 transition-all duration-200 hover:-translate-y-0.5 shadow-sm']) }}>
        {{ $slot }}
    </button>
@endif
