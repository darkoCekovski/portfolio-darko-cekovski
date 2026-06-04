@php
    $locales = [
        'en' => ['name' => 'English', 'flag' => '/images/flags/us.svg', 'short' => 'EN'],
        'de' => ['name' => 'Deutsch', 'flag' => '/images/flags/de.svg', 'short' => 'DE'],
    ];
    $current = app()->getLocale();
    $curr = $locales[$current] ?? $locales['en'];
@endphp

<div x-data="{ open: false }" @keydown.escape.window="open = false" class="relative">
    <button @click="open = !open" type="button"
            class="inline-flex items-center gap-1.5 h-9 px-3 rounded-lg text-sm font-medium
                   bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10
                   text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-white/10
                   transition-all duration-200">
        <img src="{{ asset($curr['flag']) }}" alt="{{ $curr['name'] }}" class="w-4 h-4 rounded-sm object-cover">
        <span>{{ $curr['short'] }}</span>
        <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
        </svg>
    </button>

    <div x-show="open" @click.away="open = false" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 top-full mt-2 w-36 rounded-xl border border-slate-200 dark:border-white/10
                bg-white dark:bg-[#0f1424] shadow-xl shadow-slate-200/50 dark:shadow-black/50 p-1 z-50">
        @foreach ($locales as $code => $data)
            <a href="{{ switch_locale_url($code) }}" wire:navigate.false
               class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm transition-colors
                      {{ $current === $code
                         ? 'bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 font-medium'
                         : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-white/5' }}">
                <img src="{{ asset($data['flag']) }}" alt="{{ $data['name'] }}" class="w-4 h-4 rounded-sm object-cover">
                {{ $data['name'] }}
                @if($current === $code)
                    <svg class="ml-auto w-3.5 h-3.5 text-indigo-500" fill="currentColor" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @endif
            </a>
        @endforeach
    </div>
</div>
