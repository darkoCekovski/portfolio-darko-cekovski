@props([
    'muted' => false,
])

<section {{ $attributes->merge([
    'class' => 'py-12 lg:py-24' . ($muted ? ' bg-slate-50/50 dark:bg-white/[0.02]' : '')
]) }}>
    <div class="max-w-6xl mx-auto px-4">
        {{ $slot }}
    </div>
</section>
