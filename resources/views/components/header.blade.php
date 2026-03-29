<header
    x-data="{ open: false }"
    class="fixed top-0 w-full bg-white dark:bg-primary/70 shadow-lg dark:shadow-[0px_27px_40px_0px_rgba(255,255,255,0.50)] z-50"
>
    <nav class="lg:container mx-auto flex justify-between items-center px-6 py-2">

        <!-- LEFT: LOGO -->
        <a href="{{ localized_route('home') }}"
           class="{{ request()->routeIs('home') ? 'pointer-events-none cursor-default' : '' }}">
            <img src="/images/logo-light.svg" alt="Logo" class="h-20 dark:hidden">
            <img src="/images/logo-dark.svg" alt="Logo" class="h-20 hidden dark:block">
        </a>

        <!-- CENTER (Desktop Only) -->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="{{ localized_route('home') }}"
               class="{{ request()->routeIs('home') ? 'text-blue-500 font-semibold uppercase tracking-[.2em]' : 'text-gray-800 dark:text-gray-200  uppercase tracking-[.2em] hover:text-blue-500 dark:hover:text-blue-500 transition-all duration-300' }}">{{ __('messages.nav_home') }}</a>
            <a href="{{ localized_route('about') }}"
               class="{{ request()->routeIs('about') ? 'text-blue-500 font-semibold uppercase tracking-[.2em]' : 'text-gray-800 dark:text-gray-200  uppercase tracking-[.2em] hover:text-blue-500 dark:hover:text-blue-500 transition-all duration-300' }}">{{ __('messages.nav_about') }}</a>
            <a href="{{ localized_route('projects') }}"
               class="{{ request()->routeIs('projects') ? 'text-blue-500 font-semibold uppercase tracking-[.2em]' : 'text-gray-800 dark:text-gray-200  uppercase tracking-[.2em] hover:text-blue-500 dark:hover:text-blue-500 transition-all duration-300' }}">{{ __('messages.nav_projects') }}</a>
            <a href="{{ localized_route('skills') }}"
               class="{{ request()->routeIs('skills') ? 'text-blue-500 font-semibold uppercase tracking-[.2em]' : 'text-gray-800 dark:text-gray-200  uppercase tracking-[.2em] hover:text-blue-500 dark:hover:text-blue-500 transition-all duration-300' }}">{{ __('messages.nav_skills') }}</a>
            <a href="{{ localized_route('contact') }}"
               class="{{ request()->routeIs('contact') ? 'text-blue-500 font-semibold uppercase tracking-[.2em]' : 'text-gray-800 dark:text-gray-200  uppercase tracking-[.2em] hover:text-blue-500 dark:hover:text-blue-500 transition-all duration-300' }}">{{ __('messages.nav_contact') }}</a>
        </div>

        <!-- RIGHT -->
        <div class="flex items-center space-x-5">
            @livewire('theme-switcher')

            @include('partials.language-switcher')

            <div class="max-lg:hidden">
                @livewire('download-cv')
            </div>

            <!-- HAMBURGER -->
            <x-hamburger></x-hamburger>
        </div>
    </nav>

    <!-- MOBILE MENU + OVERLAY -->
    <div
        x-show="open"
        x-cloak
        class="lg:hidden fixed inset-0 z-50"
    >
        <!-- Dark Blurred Overlay -->
        <div
            @click="open = false"
            class="absolute inset-0 bg-black/70 backdrop-blur-md transition-opacity duration-300"
        ></div>

        <!-- Sidebar with proper slide transition -->
        <aside
            x-show="open"
            @click.stop
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            @keydown.escape.window="open = false"
            class="absolute inset-y-0 left-0 w-3/4 bg-white dark:bg-gray-900 shadow-2xl overflow-y-auto px-6 py-20"
        >
            <nav class="flex flex-col space-y-6 text-lg">
                <a href="{{ localized_route('home') }}"
                   class="{{ request()->routeIs('home') ? 'text-blue-500 text-xl font-semibold uppercase tracking-[.2em]' : 'text-xl text-gray-800 dark:text-gray-200 uppercase tracking-[.2em] hover:text-darkRed' }}">{{ __('messages.nav_home') }}</a>
                <a href="{{ localized_route('about') }}"
                   class="{{ request()->routeIs('about') ? 'text-blue-500 text-xl font-semibold uppercase tracking-[.2em]' : 'text-xl text-gray-800 dark:text-gray-200 uppercase tracking-[.2em] hover:text-darkRed' }}">{{ __('messages.nav_about') }}</a>
                <a href="{{ localized_route('projects') }}"
                   class="{{ request()->routeIs('projects') ? 'text-blue-500 text-xl font-semibold uppercase tracking-[.2em]' : 'text-xl text-gray-800 dark:text-gray-200 uppercase tracking-[.2em] hover:text-darkRed' }}">{{ __('messages.nav_projects') }}</a>
                <a href="{{ localized_route('skills') }}"
                   class="{{ request()->routeIs('skills') ? 'text-blue-500 text-xl font-semibold uppercase tracking-[.2em]' : 'text-xl text-gray-800 dark:text-gray-200 uppercase tracking-[.2em] hover:text-darkRed' }}">{{ __('messages.nav_skills') }}</a>
                <a href="{{ localized_route('contact') }}"
                   class="{{ request()->routeIs('contact') ? 'text-blue-500 text-xl font-semibold uppercase tracking-[.2em]' : 'text-xl text-gray-800 dark:text-gray-200 uppercase tracking-[.2em] hover:text-darkRed' }}">{{ __('messages.nav_contact') }}</a>

                <div class="border-t border-gray-300 dark:border-gray-700 pt-6">
                    @livewire('download-cv')
                </div>
            </nav>
        </aside>
    </div>
</header>
