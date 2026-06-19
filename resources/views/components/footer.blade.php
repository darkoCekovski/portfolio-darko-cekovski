<footer class="border-t border-slate-200 dark:border-white/10 mt-12 lg:mt-24">
    <div class="max-w-6xl mx-auto px-6 py-10">

        {{-- Top row --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-6 mb-8">

            {{-- Logo --}}
            <a href="{{ localized_route('home') }}" class="flex items-center hover:opacity-80 transition-opacity duration-200">
                <img src="{{ asset('images/logo-dark.svg') }}"
                     alt="Darko Cekovski"
                     class="h-20 hidden dark:block">
                <img src="{{ asset('images/logo-light.svg') }}"
                     alt="Darko Cekovski"
                     class="h-20 block dark:hidden">
            </a>

            {{-- Social links --}}
            <div class="flex items-center gap-3">
                <a href="https://github.com/darkoCekovski" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-lg bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 dark:text-slate-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-500/10 transition-all duration-200">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.247a10 10 0 0 0-3.162 19.488c.5.092.682-.217.682-.482 0-.237-.009-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844a9.59 9.59 0 0 1 2.504.337c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0 0 12 2.247z"/>
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/darkocekovski/" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-lg bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 dark:text-slate-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-500/10 transition-all duration-200">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>
                <a href="https://x.com/cekovskidarko" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-lg bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 dark:text-slate-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-500/10 transition-all duration-200">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.836L1.254 2.25H8.08l4.253 5.622 5.91-5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>
            </div>

            {{-- Legal links --}}
            <div class="flex items-center gap-5 text-sm">
                <a href="{{ localized_route('imprint') }}"
                   class="text-primary-500 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium transition-colors duration-200">
                    {{ __('messages.imprint_title') }}
                </a>
                <span class="text-slate-300 dark:text-slate-600">·</span>
                <a href="{{ localized_route('privacy') }}"
                   class="text-primary-500 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium transition-colors duration-200">
                    {{ __('messages.privacy_title') }}
                </a>
            </div>

        </div>

        {{-- Divider --}}
        <div class="border-t border-slate-100 dark:border-white/5"></div>

        {{-- Bottom row --}}
        <div class="pt-6 text-center">
            <p class="text-xs text-slate-400 dark:text-slate-500">
                © {{ date('Y') }} Darko Cekovski. Built with Laravel, Livewire &amp; Tailwind.
            </p>
        </div>

    </div>
</footer>
