<div>
    @php
        $locales = [
            'en' => ['name' => 'English', 'flag' => '/images/flags/us.svg'],
            'de' => ['name' => 'Deutsch', 'flag' => '/images/flags/de.svg'],
        ];
        $current = app()->getLocale();
        $curr = $locales[$current] ?? ['name' => 'English', 'flag' => '/images/flags/us.svg'];
    @endphp

    <div x-data="{ open: false }"
         x-cloak
         @keydown.escape.window="open = false"
         class="relative"
    >
        <!-- Toggle button -->
        <button type="button"
                @click="open = !open"
                x-cloak
                aria-haspopup="menu"
                class="inline-flex items-center gap-2 h-10 bg-white dark:bg-zinc-900 text-black dark:text-white text-sm font-medium border border-zinc-300 dark:border-zinc-700 rounded-lg shadow-sm hover:bg-zinc-100 dark:hover:bg-zinc-800 focus:outline-0 focus:ring-0 transition-all duration-200 ease-in-out px-3">
            <img src="{{ asset($curr['flag']) }}" alt="{{ $curr['name'] }}" class="w-5 h-5 rounded-full">
            <span>{{ strtoupper($current) }}</span>
        </button>
        <!-- Dropdown Menu -->
        <div x-show="open"
             @click.away="open = false"
             x-transition
             x-cloak
             role="menu"
             class="absolute right-0 z-50 w-36 bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg shadow-lg p-1 mt-2">
            @foreach ($locales as $code => $data)
                @php
                    $flag = $data['flag'] ?? '/images/flags/us.svg';
                    $name = $data['name'] ?? strtoupper($code);
                    $url  = switch_locale_url($code);
                @endphp

                {{-- IMPORTANT: disable Livewire navigation on these links if you use it globally --}}
                <a href="{{ $url }}" wire:navigate="false"
                   role="menuitem"
                   class="flex items-center gap-2 w-full text-black dark:text-white text-sm text-left rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-all duration-200 ease-in-out px-3 py-2 {{ $current === $code ? 'font-bold' : '' }}">
                    <img src="{{ asset($flag) }}" alt="{{ $name }}" class="w-5 h-5 rounded-full">
                    <span>{{ $name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>

