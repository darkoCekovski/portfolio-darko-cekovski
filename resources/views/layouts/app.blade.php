<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('messages.site_title'))</title>

    <!-- Favicon (Multiple Sizes) -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-16x16.ico') }}" sizes="16x16">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-32x32.ico') }}" sizes="32x32">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-48x48.ico') }}" sizes="48x48">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-64x64.ico') }}" sizes="64x64">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-96x96.ico') }}" sizes="96x96">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-128x128.ico') }}" sizes="128x128">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-180x180.ico') }}" sizes="180x180">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-192x192.ico') }}" sizes="192x192">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon-512x512.ico') }}" sizes="512x512">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="dark:bg-gradient-to-b dark:from-[#05060F] dark:to-[#0A0B16] font-inter transition-colors duration-300"
      x-data="{ theme: localStorage.getItem('theme') || 'system' }"
      x-bind:class="{ 'dark': theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) }">
<div class="bg-stars bg-cover bg-top bg-fixed">

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
