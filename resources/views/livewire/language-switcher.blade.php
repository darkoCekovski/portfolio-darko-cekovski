<div x-data="{ open: false }" class="relative">
    {{-- Dropdown toggle --}}
    <button @click="open = !open"
            class="p-2 bg-gray-200 dark:bg-gray-700 rounded flex items-center gap-2">
        <img src="{{ asset($availableLocales[$currentLocale]['flag']) }}"
             alt="{{ $availableLocales[$currentLocale]['name'] }}"
             class="w-5 h-5 rounded-full">
        <span>{{ strtoupper($currentLocale) }}</span>
    </button>

    {{-- Language list --}}
    <div x-show="open" @click.away="open = false"
         class="absolute mt-2 right-0 w-40 bg-white dark:bg-gray-800 rounded shadow z-50">
        @foreach ($availableLocales as $locale => $data)
            <button wire:click="switchLanguage('{{ $locale }}')"
                    class="flex items-center gap-2 w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-700
                    {{ $currentLocale === $locale ? 'font-bold' : '' }}">
                <img src="{{ asset($data['flag']) }}"
                     alt="{{ $data['name'] }}"
                     class="w-5 h-5 rounded-full">
                <span>{{ $data['name'] }}</span>
            </button>
        @endforeach
    </div>
</div>


