@props([
    'padding' => 'p-5',
    'title'   => '',
])

<div {{ $attributes->merge(['class' => $padding . ' bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] rounded-2xl hover:shadow-lg hover:shadow-indigo-500/10 hover:border-indigo-300 dark:hover:border-indigo-500/40 transition-all duration-300']) }}>

    @if($title)
        <div class="flex items-center gap-3 mb-4">
            @isset($icon)
                <div
                    class="w-8 h-8 flex items-center justify-center flex-shrink-0 bg-indigo-50 dark:bg-indigo-500/10 rounded-lg">
                    {{ $icon }}
                </div>
            @endisset
            <h3 class="text-slate-400 dark:text-slate-500 text-xs font-bold uppercase tracking-widest">
                {{ $title }}
            </h3>
        </div>
    @endif

    {{ $slot }}
</div>
