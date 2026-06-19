@props([
    'href' => '#',
])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'group inline-flex items-center text-sm font-semibold text-primary-600 dark:text-primary-400 transition-colors duration-200']) }}>
    {{ $slot }}
    <span class="inline-block w-4 overflow-visible ml-2">
        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1.5"
             fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
        </svg>
    </span>
</a>
