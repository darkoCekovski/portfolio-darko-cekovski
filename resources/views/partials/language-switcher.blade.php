<div>
    @php
        $locales = [
            'en' => ['name' => 'English', 'flag' => '/images/flags/us.svg'],
            'de' => ['name' => 'Deutsch', 'flag' => '/images/flags/de.svg'],
        ];
        $current = app()->getLocale();
        $curr = $locales[$current] ?? ['name' => 'English', 'flag' => '/images/flags/us.svg'];
    @endphp

    <div x-data="{ open: false }" class="relative">
        <button type="button"
                @click="open = !open"
                class="flex items-center gap-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded p-2">
            <img src="{{ asset($curr['flag']) }}" alt="{{ $curr['name'] }}" class="w-5 h-5 rounded-full">
            <span>{{ strtoupper($current) }}</span>
        </button>

        <div x-show="open" @click.away="open = false"
             class="absolute mt-2 right-0 w-44 bg-white dark:bg-gray-800 rounded shadow z-50">
            @foreach ($locales as $code => $data)
                @php
                    $flag = $data['flag'] ?? '/images/flags/us.svg';
                    $name = $data['name'] ?? strtoupper($code);
                    $url  = switch_locale_url($code);
                @endphp

                {{-- IMPORTANT: disable Livewire navigation on these links if you use it globally --}}
                <a href="{{ $url }}" wire:navigate="false"
                   class="flex items-center gap-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 px-4 py-2 {{ $current === $code ? 'font-bold' : '' }}">
                    <img src="{{ asset($flag) }}" alt="{{ $name }}" class="w-5 h-5 rounded-full">
                    <span>{{ $name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>

