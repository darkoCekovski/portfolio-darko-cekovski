<div>
    <div
        x-data="themeDropdown()"
        x-init="init()"
        class="relative"
        @keydown.escape.window="open = false"
    >
        <!-- Toggle button -->
        <button
            type="button"
            @click="open = !open"
            :aria-expanded="open"
            aria-haspopup="menu"
            class="inline-flex items-center gap-2 rounded-xl border border-zinc-300 bg-white px-3 py-2 text-sm font-medium shadow-sm hover:bg-zinc-50 focus:outline-none focus:ring dark:border-zinc-700 dark:bg-zinc-900 dark:hover:bg-zinc-800 text-black dark:text-white"
        >
            <!-- Current icon -->
            <span class="size-4" aria-hidden="true">
            <template x-if="theme === 'light'">
                <!-- Sun -->
                <svg viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path
                        d="M10 3.5a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 10 3.5Zm5.657 1.843a.75.75 0 0 1 1.06 1.06l-.353.354a.75.75 0 1 1-1.06-1.06l.353-.354ZM10 6.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Zm-6.364-.8a.75.75 0 1 1 1.06 1.06l-.353.354a.75.75 0 1 1-1.06-1.06l.353-.354ZM3.5 10a.75.75 0 0 1-.75-.75v-.5a.75.75 0 0 1 1.5 0v.5A.75.75 0 0 1 3.5 10Zm12.75 0a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1 0-1.5h.5c.414 0 .75.336.75.75Zm-9.95 4.243a.75.75 0 1 1 1.06 1.06l-.353.354a.75.75 0 1 1-1.06-1.06l.353-.354Zm9.192 0 .353.354a.75.75 0 1 1-1.06 1.06l-.354-.353a.75.75 0 0 1 1.06-1.06ZM10 16.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-1.5 0v-.5c0-.414.336-.75.75-.75Z"/>
                </svg>
            </template>
            <template x-if="theme === 'dark'">
                <!-- Moon -->
                <svg viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path
                        d="M14.53 12.87a6.5 6.5 0 0 1-7.4-10.5.75.75 0 0 0-.74-1.29A8 8 0 1 0 18.91 13.6a.75.75 0 0 0-1.25-.72 6.48 6.48 0 0 1-3.13.99Z"/>
                </svg>
            </template>
            <template x-if="theme === 'system'">
                <!-- Laptop -->
                <svg viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path
                        d="M3.5 5A1.5 1.5 0 0 1 5 3.5h10A1.5 1.5 0 0 1 16.5 5v7H3.5V5Zm-1 8.5h15a1 1 0 0 1 0 2H2.5a1 1 0 1 1 0-2Z"/>
                </svg>
            </template>
        </span>
            <span x-text="label()" class="select-none"></span>
            <!-- Caret -->
            <svg viewBox="0 0 20 20" fill="currentColor" class="size-4 opacity-70">
                <path fill-rule="evenodd"
                      d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.086l3.71-3.855a.75.75 0 1 1 1.08 1.04l-4.24 4.4a.75.75 0 0 1-1.08 0l-4.24-4.4a.75.75 0 0 1 .02-1.06Z"
                      clip-rule="evenodd"/>
            </svg>
        </button>

        <!-- Menu -->
        <div
            x-show="open"
            x-transition
            @click.outside="open = false"
            role="menu"
            class="absolute right-0 z-50 mt-2 w-48 rounded-xl border border-zinc-200 bg-white p-1 shadow-lg dark:border-zinc-700 dark:bg-zinc-900"
        >
            <!-- Item template helper -->
            <template x-for="opt in options" :key="opt.value">
                <button
                    type="button"
                    @click="setTheme(opt.value)"
                    role="menuitemradio"
                    :aria-checked="isSelected(opt.value)"
                    class="flex w-full items-center justify-between gap-2 rounded-lg px-3 py-2 text-left text-sm hover:bg-zinc-100 dark:hover:bg-zinc-800 text-black dark:text-white"
                    :class="isSelected(opt.value) ? 'font-semibold' : 'font-normal'"
                >
                <span class="flex items-center gap-2">
                    <span class="size-4" x-html="opt.icon"></span>
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
        function themeDropdown() {
            // ... keep your icons and other code the same

            return {
                open: false,
                theme: localStorage.getItem('theme') || 'system',
                mql: null,
                options: [
                    {
                        value: 'light',
                        label: 'Light',
                        icon: /* sun */ `<svg viewBox='0 0 20 20' fill='currentColor' class='size-4'><path d='M10 3.5a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 10 3.5Zm5.657 1.843a.75.75 0 0 1 1.06 1.06l-.353.354a.75.75 0 1 1-1.06-1.06l.353-.354ZM10 6.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Zm-6.364-.8a.75.75 0 1 1 1.06 1.06l-.353.354a.75.75 0 1 1-1.06-1.06l.353-.354ZM3.5 10a.75.75 0 0 1-.75-.75v-.5a.75.75 0 0 1 1.5 0v.5A.75.75 0 0 1 3.5 10Zm12.75 0a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1 0-1.5h.5c.414 0 .75.336.75.75Zm-9.95 4.243a.75.75 0 1 1 1.06 1.06l-.353.354a.75.75 0 1 1-1.06-1.06l.353-.354Zm9.192 0 .353.354a.75.75 0 1 1-1.06 1.06l-.354-.353a.75.75 0 0 1 1.06-1.06ZM10 16.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-1.5 0v-.5c0-.414.336-.75.75-.75Z'/></svg>`
                    },
                    {
                        value: 'dark',
                        label: 'Dark',
                        icon: /* moon */ `<svg viewBox='0 0 20 20' fill='currentColor' class='size-4'><path d='M14.53 12.87a6.5 6.5 0 0 1-7.4-10.5.75.75 0 0 0-.74-1.29A8 8 0 1 0 18.91 13.6a.75.75 0 0 0-1.25-.72 6.48 6.48 0 0 1-3.13.99Z'/></svg>`
                    },
                    {
                        value: 'system',
                        label: 'System',
                        icon: /* laptop */ `<svg viewBox='0 0 20 20' fill='currentColor' class='size-4'><path d='M3.5 5A1.5 1.5 0 0 1 5 3.5h10A1.5 1.5 0 0 1 16.5 5v7H3.5V5Zm-1 8.5h15a1 1 0 0 1 0 2H2.5a1 1 0 1 1 0-2Z'/></svg>`
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
                    return this.theme.charAt(0).toUpperCase() + this.theme.slice(1);
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



