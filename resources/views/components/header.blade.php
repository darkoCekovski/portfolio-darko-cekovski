<header
    x-data="{ open: false, scrolled: window.scrollY > 20 }"
    x-init="
        requestAnimationFrame(() => scrolled = window.scrollY > 20);
        window.addEventListener('scroll', () => scrolled = window.scrollY > 20);
    "
    :class="scrolled ? 'bg-white/80 dark:bg-[#080b14]/80 backdrop-blur-xl shadow-lg shadow-slate-200/20 dark:shadow-black/30' : 'bg-transparent'"
    class="fixed top-0 inset-x-0 z-[9999] transition-all duration-300"
>
    <nav class="max-w-6xl mx-auto flex items-center justify-between px-6 h-20">

        {{-- Logo --}}
        <a href="{{ localized_route('home') }}" class="group flex items-center gap-2 font-bold text-xl">
            <span
                class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 via-blue-500 to-sky-400 flex items-center justify-center text-white text-sm font-black shadow-lg group-hover:scale-110 transition-transform duration-200">D</span>
            <span class="text-slate-800 dark:text-white">Darko<span class="text-indigo-500">.</span></span>
        </a>

        {{-- Desktop nav --}}
        <div class="hidden lg:flex items-center gap-1"
             x-data="{ hash: window.location.hash }"
             x-init="
                window.addEventListener('hashchange', () => hash = window.location.hash);
                window.addEventListener('popstate', () => hash = window.location.hash);
             ">

            {{-- Home (hash-based → dynamic) --}}
            <x-nav-link
                href="{{ localized_route('home') }}"
                dynamic
                @click="hash = ''"
                x-bind:class="(hash !== '#services' && {{ request()->routeIs('home') && !request()->routeIs('service.detail') ? 'true' : 'false' }})
                    ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-500/10'
                    : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5'"
            >
                {{ __('messages.nav_home') }}
            </x-nav-link>

            {{-- About --}}
            <x-nav-link
                href="{{ localized_route('about') }}"
                :active="request()->routeIs('about')"
            >
                {{ __('messages.nav_about') }}
            </x-nav-link>

            {{-- Services (hash-based → dynamic) --}}
            <x-nav-link
                href="{{ localized_route('home') }}#services"
                dynamic
                @click="hash = '#services'"
                x-bind:class="(hash === '#services' || {{ request()->routeIs('service.detail') ? 'true' : 'false' }})
                    ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-500/10'
                    : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5'"
            >
                {{ __('messages.nav_services') }}
            </x-nav-link>

            {{-- Projects --}}
            <x-nav-link
                href="{{ localized_route('projects') }}"
                :active="request()->routeIs('projects') || request()->routeIs('project.detail')"
            >
                {{ __('messages.nav_projects') }}
            </x-nav-link>

            {{-- Skills --}}
            <x-nav-link
                href="{{ localized_route('skills') }}"
                :active="request()->routeIs('skills') || request()->routeIs('skill.detail')"
            >
                {{ __('messages.nav_skills') }}
            </x-nav-link>

            {{-- Contact --}}
            <x-nav-link
                href="{{ localized_route('contact') }}"
                :active="request()->routeIs('contact')"
            >
                {{ __('messages.nav_contact') }}
            </x-nav-link>

        </div>

        {{-- Right controls --}}
        <div class="flex items-center gap-3">
            @livewire('theme-switcher')
            @include('partials.language-switcher')
            <div class="hidden lg:block">
                @livewire('download-cv')
            </div>

            {{-- Hamburger --}}
            <button @click="open = !open"
                    class="lg:hidden w-10 h-10 flex flex-col items-center justify-center gap-1.5 rounded-lg hover:bg-slate-100 dark:hover:bg-white/5 transition-colors"
                    aria-label="Menu">
                <span :class="open ? 'rotate-45 translate-y-2' : ''"
                      class="w-5 h-0.5 bg-slate-700 dark:bg-slate-300 transition-transform duration-300 origin-center"></span>
                <span :class="open ? 'opacity-0' : ''"
                      class="w-5 h-0.5 bg-slate-700 dark:bg-slate-300 transition-opacity duration-300"></span>
                <span :class="open ? '-rotate-45 -translate-y-2' : ''"
                      class="w-5 h-0.5 bg-slate-700 dark:bg-slate-300 transition-transform duration-300 origin-center"></span>
            </button>
        </div>
    </nav>

    {{-- Mobile menu --}}
    <div
        x-show="open"
        x-cloak
        x-data="{ hash: window.location.hash }"
        x-init="
            window.addEventListener('hashchange', () => hash = window.location.hash);
            window.addEventListener('popstate', () => hash = window.location.hash);
        "
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden border-t border-slate-200 dark:border-white/10 bg-white/95 dark:bg-[#080b14]/95 backdrop-blur-xl px-6 py-4 space-y-1"
    >
        {{-- Home (hash-based → dynamic) --}}
        <x-nav-link
            href="{{ localized_route('home') }}"
            mobile
            dynamic
            @click="open = false; hash = ''"
            x-bind:class="(hash !== '#services' && {{ request()->routeIs('home') && !request()->routeIs('service.detail') ? 'true' : 'false' }})
                ? 'bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400'
                : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-white/5'"
        >
            {{ __('messages.nav_home') }}
        </x-nav-link>

        {{-- About --}}
        <x-nav-link
            href="{{ localized_route('about') }}"
            mobile
            :active="request()->routeIs('about')"
            @click="open = false"
        >
            {{ __('messages.nav_about') }}
        </x-nav-link>

        {{-- Services (hash-based → dynamic) --}}
        <x-nav-link
            href="{{ localized_route('home') }}#services"
            mobile
            dynamic
            @click="open = false; hash = '#services'"
            x-bind:class="(hash === '#services' || {{ request()->routeIs('service.detail') ? 'true' : 'false' }})
                ? 'bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400'
                : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-white/5'"
        >
            {{ __('messages.nav_services') }}
        </x-nav-link>

        {{-- Projects --}}
        <x-nav-link
            href="{{ localized_route('projects') }}"
            mobile
            :active="request()->routeIs('projects') || request()->routeIs('project.detail')"
            @click="open = false"
        >
            {{ __('messages.nav_projects') }}
        </x-nav-link>

        {{-- Skills --}}
        <x-nav-link
            href="{{ localized_route('skills') }}"
            mobile
            :active="request()->routeIs('skills') || request()->routeIs('skill.detail')"
            @click="open = false"
        >
            {{ __('messages.nav_skills') }}
        </x-nav-link>

        {{-- Contact --}}
        <x-nav-link
            href="{{ localized_route('contact') }}"
            mobile
            :active="request()->routeIs('contact')"
            @click="open = false"
        >
            {{ __('messages.nav_contact') }}
        </x-nav-link>

        <div class="pt-3 border-t border-slate-200 dark:border-white/10">
            @livewire('download-cv')
        </div>
    </div>

</header>
