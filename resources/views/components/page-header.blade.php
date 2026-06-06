@props([
    'eyebrow'  => '',
    'title'    => '',
    'subtitle' => '',
])

<section class="bg-slate-50/50 dark:bg-white/[0.02] border-b border-slate-200 dark:border-white/10 py-20">
    <div class="max-w-6xl mx-auto px-4">

        @if($eyebrow)
            <span
                class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-3 block reveal">
                {{ $eyebrow }}
            </span>
        @endif

        <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-white mb-4 reveal reveal-delay-1">
            {{ $title }}
        </h1>

        @if($subtitle)
            <p class="text-slate-500 dark:text-slate-400 max-w-xl reveal reveal-delay-2">
                {{ $subtitle }}
            </p>
        @endif

    </div>
</section>
