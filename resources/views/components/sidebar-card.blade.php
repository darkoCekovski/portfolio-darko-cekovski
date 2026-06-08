@props([
    'padding' => 'p-5',
])

<div {{ $attributes->merge(['class' => $padding . ' rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] hover:shadow-lg hover:shadow-indigo-500/10 hover:border-indigo-300 dark:hover:border-indigo-500/40 transition-all duration-300']) }}>
    {{ $slot }}
</div>
