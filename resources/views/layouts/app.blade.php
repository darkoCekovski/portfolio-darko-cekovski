<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Darko Cekovski Portfolio')</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="transition-colors duration-300" x-data="{ theme: localStorage.getItem('theme') || 'system' }" x-bind:class="{ 'dark': theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) }">
    <!-- Header -->
    <header class="fixed top-0 w-full bg-white dark:bg-gray-900 shadow-md z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-3">
                <img src="/images/logo-light.svg" alt="Darko Cekovski Logo" class="h-10 dark:hidden">
                <img src="/images/logo-dark.svg" alt="Darko Cekovski Logo" class="h-10 hidden dark:block">
                <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">Darko Cekovski</span>
            </a>
            <div class="flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">Home</a>
{{--                <a href="{{ route('about') }}" class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">About</a>--}}
{{--                <a href="{{ route('projects') }}" class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">Projects</a>--}}
{{--                <a href="{{ route('contact') }}" class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">Contact</a>--}}
                @livewire('theme-switcher')
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="pt-20 min-h-screen bg-gray-100 dark:bg-gray-800">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 py-8">
        <div class="container mx-auto px-6 text-center">
            <div class="mb-4">
                <img src="/images/logo-light.svg" alt="Darko Cekovski Logo" class="h-12 mx-auto dark:hidden">
                <img src="/images/logo-dark.svg" alt="Darko Cekovski Logo" class="h-12 mx-auto hidden dark:block">
            </div>
            <div class="flex justify-center space-x-6 mb-4">
                <a href="https://github.com/your-username" class="hover:text-blue-600 dark:hover:text-blue-400">GitHub</a>
                <a href="https://linkedin.com/in/your-username" class="hover:text-blue-600 dark:hover:text-blue-400">LinkedIn</a>
                <a href="https://twitter.com/your-username" class="hover:text-blue-600 dark:hover:text-blue-400">Twitter</a>
            </div>
            <p>&copy; 2025 Darko Cekovski. All rights reserved.</p>
        </div>
    </footer>

    @livewireScripts
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const theme = localStorage.getItem('theme') || 'system';
            if (theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>
    </body>
</html>
