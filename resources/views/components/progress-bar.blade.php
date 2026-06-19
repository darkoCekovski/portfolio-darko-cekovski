@props([
    'label'      => '',
    'value'      => '',
    'percent'    => 0,
    'valueClass' => 'text-slate-400 dark:text-slate-500',
])

<div>
    <div class="flex justify-between text-xs mb-1">
        <span class="font-semibold text-slate-700 dark:text-slate-300">{{ $label }}</span>
        <span class="{{ $valueClass }}">{{ $value }}</span>
    </div>
    <div class="h-1.5 rounded-full bg-slate-100 dark:bg-white/10 overflow-hidden">
        <div class="h-full rounded-full bg-gradient-to-r from-primary-500 to-accent-400"
             style="width: {{ $percent }}%"></div>
    </div>
</div>
