<div>
    <div
        x-data="themeDropdown({
            light: '{{ __('messages.theme_light') }}',
            dark: '{{ __('messages.theme_dark') }}',
            system: '{{ __('messages.theme_system') }}'
        })"
        x-init="init()"
        @keydown.escape.window="open = false"
        class="relative"
    >
        <!-- Toggle button -->
        <button
            type="button"
            @click="open = !open"
            :aria-expanded="open"
            x-cloak
            aria-haspopup="menu"
            class="inline-flex items-center gap-2 h-10 bg-white dark:bg-zinc-900 text-black dark:text-white text-sm font-medium border border-zinc-300 dark:border-zinc-700 rounded-lg shadow-sm hover:bg-zinc-100 dark:hover:bg-zinc-800 focus:outline-0 focus:ring-0 transition-all duration-200 ease-in-out px-3">
            <!-- Current icon -->
            <span aria-hidden="true">
                <template x-if="theme === 'light'">
                    <!-- Sun -->
                    <svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 17.625C15.1066 17.625 17.625 15.1066 17.625 12C17.625 8.8934 15.1066 6.375 12 6.375C8.8934 6.375 6.375 8.8934 6.375 12C6.375 15.1066 8.8934 17.625 12 17.625Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 3.375V1.5" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M5.89683 5.89683L4.57495 4.57495" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.375 12H1.5" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M5.89683 18.103L4.57495 19.4249" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M12 20.625V22.5" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M18.103 18.103L19.4249 19.4249" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M20.625 12H22.5" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M18.103 5.89683L19.4249 4.57495" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </template>
                <template x-if="theme === 'dark'">
                    <!-- Moon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.3157 14.3062C18.8432 14.7191 17.2874 14.7326 15.8079 14.3454C14.3284 13.9582 12.9787 13.1841 11.8973 12.1027C10.816 11.0214 10.0419 9.67162 9.65466 8.19216C9.26742 6.7127 9.28095 5.15683 9.69386 3.68433C8.24211 4.0884 6.92156 4.86578 5.86375 5.93904C4.80593 7.01231 4.04778 8.34399 3.66479 9.80144C3.28181 11.2589 3.28736 12.7913 3.6809 14.2459C4.07444 15.7006 4.84223 17.0267 5.9078 18.0923C6.97336 19.1578 8.29951 19.9256 9.75415 20.3192C11.2088 20.7127 12.7412 20.7183 14.1986 20.3353C15.6561 19.9523 16.9878 19.1941 18.061 18.1363C19.1343 17.0785 19.9117 15.758 20.3157 14.3062V14.3062Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </template>
                <template x-if="theme === 'system'">
                    <!-- Laptop -->
                    <svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.75 16.5V6.75C3.75 6.35218 3.90804 5.97064 4.18934 5.68934C4.47064 5.40804 4.85218 5.25 5.25 5.25H18.75C19.1478 5.25 19.5294 5.40804 19.8107 5.68934C20.092 5.97064 20.25 6.35218 20.25 6.75V16.5"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M2.25 16.5H21.75V18C21.75 18.3978 21.592 18.7794 21.3107 19.0607C21.0294 19.342 20.6478 19.5 20.25 19.5H3.75C3.35218 19.5 2.97064 19.342 2.68934 19.0607C2.40804 18.7794 2.25 18.3978 2.25 18V16.5Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.5 8.25H10.5" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </template>
            </span>
            <span x-text="label()" class="select-none"></span>
        </button>
        <!-- Dropdown Menu -->
        <div
            x-show="open"
            x-transition
            @click.outside="open = false"
            x-cloak
            role="menu"
            class="absolute right-0 z-50 w-48 bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg shadow-lg p-1 mt-2"
        >
            <!-- Item template helper -->
            <template x-for="opt in options" :key="opt.value">
                <button
                    type="button"
                    @click="setTheme(opt.value)"
                    role="menuitemradio"
                    :aria-checked="isSelected(opt.value)"
                    class="flex items-center justify-between gap-2 w-full text-black dark:text-white text-sm text-left rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-all duration-200 ease-in-out px-3 py-2"
                    :class="isSelected(opt.value) ? 'font-semibold' : 'font-normal'"
                >
                    <span class="flex items-center gap-2">
                        <span class="" x-html="opt.icon"></span>
                        <span x-text="opt.label"></span>
                    </span>
                    <!-- Checkmark only on selected -->
                    <svg x-show="isSelected(opt.value)"
                         width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.125 9.75L10.6219 15L7.875 12.375" stroke="green" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                            stroke="green" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </template>
        </div>
    </div>

    <script>
        function themeDropdown(translations) {
            return {
                open: false,
                theme: localStorage.getItem('theme') || 'system',
                mql: null,
                options: [
                    {
                        value: 'light',
                        label: translations.light,
                        icon: `<svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M12 17.625C15.1066 17.625 17.625 15.1066 17.625 12C17.625 8.8934 15.1066 6.375 12 6.375C8.8934 6.375 6.375 8.8934 6.375 12C6.375 15.1066 8.8934 17.625 12 17.625Z"
                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M12 3.375V1.5" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round"/>
                                 <path d="M5.89683 5.89683L4.57495 4.57495" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M3.375 12H1.5" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round"/>
                                 <path d="M5.89683 18.103L4.57495 19.4249" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round"/>
                                 <path d="M12 20.625V22.5" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round"/>
                                 <path d="M18.103 18.103L19.4249 19.4249" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round"/>
                                 <path d="M20.625 12H22.5" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round"/>
                                 <path d="M18.103 5.89683L19.4249 4.57495" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round"/>
                             </svg>`
                    },
                    {
                        value: 'dark',
                        label: translations.dark,
                        icon: `<svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M20.3157 14.3062C18.8432 14.7191 17.2874 14.7326 15.8079 14.3454C14.3284 13.9582 12.9787 13.1841 11.8973 12.1027C10.816 11.0214 10.0419 9.67162 9.65466 8.19216C9.26742 6.7127 9.28095 5.15683 9.69386 3.68433C8.24211 4.0884 6.92156 4.86578 5.86375 5.93904C4.80593 7.01231 4.04778 8.34399 3.66479 9.80144C3.28181 11.2589 3.28736 12.7913 3.6809 14.2459C4.07444 15.7006 4.84223 17.0267 5.9078 18.0923C6.97336 19.1578 8.29951 19.9256 9.75415 20.3192C11.2088 20.7127 12.7412 20.7183 14.1986 20.3353C15.6561 19.9523 16.9878 19.1941 18.061 18.1363C19.1343 17.0785 19.9117 15.758 20.3157 14.3062V14.3062Z"
                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                             </svg>`
                    },
                    {
                        value: 'system',
                        label: translations.system,
                        icon: `<svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M3.75 16.5V6.75C3.75 6.35218 3.90804 5.97064 4.18934 5.68934C4.47064 5.40804 4.85218 5.25 5.25 5.25H18.75C19.1478 5.25 19.5294 5.40804 19.8107 5.68934C20.092 5.97064 20.25 6.35218 20.25 6.75V16.5"
                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path
                                     d="M2.25 16.5H21.75V18C21.75 18.3978 21.592 18.7794 21.3107 19.0607C21.0294 19.342 20.6478 19.5 20.25 19.5H3.75C3.35218 19.5 2.97064 19.342 2.68934 19.0607C2.40804 18.7794 2.25 18.3978 2.25 18V16.5Z"
                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M13.5 8.25H10.5" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round"/>
                             </svg>`
                    },
                ],
                init() {
                    this.mql = window.matchMedia('(prefers-color-scheme: dark)');
                    const onChange = () => {
                        if (this.theme === 'system') this.apply();
                    };
                    if (this.mql.addEventListener) this.mql.addEventListener('change', onChange);
                    else if (this.mql.addListener) this.mql.addListener(onChange);
                    this.apply();
                },
                label() {
                    const selected = this.options.find(opt => opt.value === this.theme);
                    return selected ? selected.label : this.theme.charAt(0).toUpperCase() + this.theme.slice(1);
                },
                isSelected(v) {
                    return this.theme === v;
                },
                setTheme(v) {
                    this.theme = v;
                    localStorage.setItem('theme', v);
                    this.apply();
                    this.open = false;
                },
                apply() {
                    const root = document.documentElement;
                    const body = document.body;
                    const osDark = this.mql ? this.mql.matches : window.matchMedia('(prefers-color-scheme: dark)').matches;
                    const isDark = this.theme === 'dark' || (this.theme === 'system' && osDark);

                    // 1) Tailwind selector
                    root.classList.toggle('dark', isDark);

                    // 2) Clean up anything else that could force dark:
                    body.classList.remove('dark');             // in case "dark" accidentally ended up on body
                    root.removeAttribute('data-theme');        // DaisyUI/Flowbite style attribute
                    body.removeAttribute('data-theme');

                    // 3) Optional: set data-theme explicitly if you *are* using DaisyUI (pick one theme):
                    // if (isDark) root.setAttribute('data-theme', 'dark'); else root.setAttribute('data-theme', 'light');
                },
            };
        }
    </script>
</div>
