<header class="fixed top-0 w-full bg-white dark:bg-gray-900 shadow-md z-50">
    <nav class="container mx-auto flex justify-between items-center px-6 py-1">
        <a href="/" class="flex items-center space-x-3">
            <img src="/images/logo-light.svg" alt="Darko Cekovski Logo" class="h-20 dark:hidden">
            <img src="/images/logo-dark.svg" alt="Darko Cekovski Logo" class="h-20 hidden dark:block">
        </a>
        <div class="flex items-center space-x-6">
            <a href="{{ localized_route('home') }}"
               class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">{{ __('messages.nav_home') }}</a>
            <a href="{{ localized_route('about') }}"
               class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">{{ __('messages.nav_about') }}</a>
            <a href="{{ localized_route('projects') }}"
               class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">{{ __('messages.nav_projects') }}</a>
            <a href="{{ localized_route('skills') }}"
               class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">{{ __('messages.nav_skills') }}</a>
            <a href="{{ localized_route('contact') }}"
               class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">{{ __('messages.nav_contact') }}</a>
        </div>
        <div class="flex items-center space-x-6">
            @livewire('theme-switcher')
            @include('partials.language-switcher')
            @livewire('download-cv')
        </div>
    </nav>
</header>
