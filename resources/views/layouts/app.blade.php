<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('messages.site_title'))</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Syncopate:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body style="background: linear-gradient(to bottom, #05060F, #0A0B16);" class="font-orbitron transition-colors duration-300"
      x-data="{ theme: localStorage.getItem('theme') || 'system' }"
      x-bind:class="{ 'dark': theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) }">

<div class="bg-stars bg-cover bg-top bg-fixed animate-stars-move">

    <!-- Header -->
    @include('components.header')

    <!-- Main Content -->
    <main class="min-h-screen pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('components.footer')

</div>

<x-button-to-top></x-button-to-top>

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
        } catch {
        }
    })();
</script>

</body>
</html>
