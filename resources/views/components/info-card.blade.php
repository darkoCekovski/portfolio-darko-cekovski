@props([
    'label' => '',
    'value' => '',
])

<div
    class="rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] transition-transform duration-200 p-5 card-glow">

    {{-- Icon slot --}}
    <div class="w-9 h-9 flex items-center justify-center bg-primary-50 dark:bg-primary-500/10 rounded-lg mb-3">
        {{ $icon }}
    </div>

    <div class="text-slate-800 dark:text-slate-200 text-sm font-semibold">{{ $label }}</div>
    <div class="text-slate-400 dark:text-slate-500 text-xs mt-0.5">{{ $value }}</div>

</div>
