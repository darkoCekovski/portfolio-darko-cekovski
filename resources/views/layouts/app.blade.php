<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('messages.site_title'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="transition-colors duration-300" x-data="{ theme: localStorage.getItem('theme') || 'system' }"
      x-bind:class="{ 'dark': theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) }">

<!-- Header -->
@include('components.header')

<!-- Main Content -->
<main class="min-h-screen bg-gray-100 dark:bg-gray-800 pt-20">
    @yield('content')
</main>

<!-- Footer -->
@include('components.footer')

@livewireScripts

<!-- Early theme init (avoids white flash) -->
<script>
    (() => {
        try {
            const stored = localStorage.getItem('theme') || 'system';
            const mq = window.matchMedia('(prefers-color-scheme: dark)');
            const isDark = stored === 'dark' || (stored === 'system' && mq.matches);
            if (isDark) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
        } catch {}
    })();
</script>

</body>
</html>
