@props([
    'eyebrow'  => '',
    'title'    => '',
    'subtitle' => '',
    'centered' => false,
    'delay'    => '',
])

<div class="{{ $centered ? 'text-center' : '' }} mb-16 reveal {{ $delay ? 'reveal-delay-'.$delay : '' }}">

    @if($eyebrow)
        <span class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-3 block">
            {{ $eyebrow }}
        </span>
    @endif

    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-4">
        {{ $title }}
    </h2>

    @if($subtitle)
        <p class="text-slate-500 dark:text-slate-400 {{ $centered ? 'max-w-xl mx-auto' : 'max-w-xl' }}">
            {{ $subtitle }}
        </p>
    @endif

</div>
