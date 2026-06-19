<div x-data="themeSwitcher()" x-init="init()" @keydown.escape.window="open=false" class="relative">
    <button @click="open=!open" type="button"
            class="w-9 h-9 rounded-lg flex items-center justify-center
                   bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10
                   text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white
                   hover:bg-slate-200 dark:hover:bg-white/10 transition-all duration-200"
            :aria-label="label()">

        {{-- Icons always in DOM, CSS shows correct one instantly --}}
        <svg class="theme-icon-light w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="4"/>
            <path
                d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32 1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
        </svg>
        <svg class="theme-icon-dark w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
        </svg>
        <svg class="theme-icon-system w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <rect x="2" y="3" width="20" height="14" rx="2"/>
            <path d="M8 21h8m-4-4v4"/>
        </svg>

    </button>

    <div x-show="open" @click.away="open=false" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 top-full mt-2 w-40 rounded-xl border border-slate-200 dark:border-white/10
                bg-white dark:bg-[#0f1424] shadow-xl shadow-slate-200/50 dark:shadow-black/50 p-1 z-50">
        <template x-for="opt in options" :key="opt.value">
            <button @click="set(opt.value)" type="button"
                    class="flex items-center gap-2.5 w-full px-3 py-2 rounded-lg text-sm transition-colors"
                    :class="theme===opt.value
                        ? 'bg-primary-50 dark:bg-primary-500/10 text-primary-600 dark:text-primary-400 font-medium'
                        : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-white/5'">
                <span x-html="opt.icon" class="w-4 h-4 flex-shrink-0"></span>
                <span x-text="opt.label"></span>
                <svg x-show="theme===opt.value" class="ml-auto w-3.5 h-3.5 text-primary-500 flex-shrink-0"
                     fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/>
                </svg>
            </button>
        </template>
    </div>

    <script>
        function themeSwitcher() {
            const sunIcon = `<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32 1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/></svg>`;
            const moonIcon = `<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>`;
            const sysIcon = `<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8m-4-4v4"/></svg>`;
            return {
                open: false,
                theme: localStorage.getItem('theme') || 'system',
                mql: null,
                options: [
                    {value: 'light', label: '{{ __("messages.theme_light") }}', icon: sunIcon},
                    {value: 'dark', label: '{{ __("messages.theme_dark") }}', icon: moonIcon},
                    {value: 'system', label: '{{ __("messages.theme_system") }}', icon: sysIcon},
                ],
                init() {
                    this.mql = window.matchMedia('(prefers-color-scheme: dark)');
                    this.mql.addEventListener('change', () => {
                        if (this.theme === 'system') this.apply();
                    });
                    this.apply();
                },
                label() {
                    return this.options.find(o => o.value === this.theme)?.label || '';
                },
                set(v) {
                    this.theme = v;
                    localStorage.setItem('theme', v);
                    document.documentElement.setAttribute('data-theme', v);
                    this.apply();
                    this.open = false;
                },
                apply() {
                    const dark = this.theme === 'dark' || (this.theme === 'system' && this.mql.matches);
                    document.documentElement.classList.toggle('dark', dark);
                },
            };
        }
    </script>
</div>
