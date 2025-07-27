<div>
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700">
        <span x-show="theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)">
            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
            </svg>
        </span>
            <span x-show="theme === 'light' || (theme === 'system' && !window.matchMedia('(prefers-color-scheme: dark)').matches)">
            <svg class="w-6 h-6 text-gray-800 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
            </svg>
        </span>
        </button>
        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-32 bg-white dark:bg-gray-800 rounded-md shadow-lg z-50">
            <button wire:click="switchTheme('light')" class="block w-full text-left px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Light</button>
            <button wire:click="switchTheme('dark')" class="block w-full text-left px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Dark</button>
            <button wire:click="switchTheme('system')" class="block w-full text-left px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">System</button>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:initialized', () => {
            window.addEventListener('theme-changed', event => {
                const theme = event.detail.theme;
                localStorage.setItem('theme', theme);
                Alpine.store('theme', theme);
                if (theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            });
        });
    </script>
</div>


