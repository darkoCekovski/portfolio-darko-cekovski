<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ── Dark mode — must run before any CSS to prevent FOUC ──────── --}}
    <script>
        (() => {
            const t = localStorage.getItem('theme') || 'system';
            document.documentElement.setAttribute('data-theme', t);
            const dark = t === 'dark' || (t === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (dark) document.documentElement.classList.add('dark');
        })();
    </script>

    {{-- ── SEO & Meta Tags ────────────────────────────────────────────── --}}
    @php
        $metaTitle       = $metaTitle       ?? 'Darko Cekovski — Laravel Full-Stack Developer';
        $metaDescription = $metaDescription ?? (app()->getLocale() === 'de'
            ? 'Full-Stack-Laravel-Entwickler spezialisiert auf Livewire, Tailwind CSS und Alpine.js. Konstanz, Deutschland. Remote seit 2020.'
            : 'Full-stack Laravel developer specialising in Livewire, Tailwind CSS and Alpine.js. Based in Constance, Germany. Remote since 2020.');
        $ogImage         = $ogImage         ?? asset('images/og-default-' . app()->getLocale() . '.png');
        $ogImageType     = str_ends_with($ogImage, '.png') ? 'image/png' : 'image/jpeg';
        $ogType          = $ogType          ?? 'website';
        $canonical       = $canonical       ?? url()->current();
        $robots          = $robots          ?? 'index, follow';
        $ogLocale        = app()->getLocale() === 'de' ? 'de_DE' : 'en_US';
        $ogLocaleAlt     = app()->getLocale() === 'de' ? 'en_US' : 'de_DE';
    @endphp

    {{-- Primary --}}
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="author"      content="Darko Cekovski">
    <meta name="robots"      content="{{ $robots }}">
    <link rel="canonical"    href="{{ $canonical }}">

    {{-- Open Graph (Facebook, LinkedIn, Instagram, WhatsApp) --}}
    <meta property="og:type"             content="{{ $ogType }}">
    <meta property="og:url"              content="{{ $canonical }}">
    <meta property="og:title"            content="{{ $metaTitle }}">
    <meta property="og:description"      content="{{ $metaDescription }}">
    <meta property="og:image"            content="{{ $ogImage }}">
    <meta property="og:image:secure_url" content="{{ $ogImage }}">
    <meta property="og:image:type"       content="{{ $ogImageType }}">
    <meta property="og:image:width"      content="1200">
    <meta property="og:image:height"     content="630">
    <meta property="og:image:alt"        content="{{ $metaTitle }}">
    <meta property="og:site_name"        content="Darko Cekovski">
    <meta property="og:locale"           content="{{ $ogLocale }}">
    <meta property="og:locale:alternate" content="{{ $ogLocaleAlt }}">

    {{-- Twitter / X --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:url"         content="{{ $canonical }}">
    <meta name="twitter:title"       content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image"       content="{{ $ogImage }}">
    <meta name="twitter:image:alt"   content="{{ $metaTitle }}">
    <meta name="twitter:creator"     content="@darkocekovski">

    {{-- ── Favicons ───────────────────────────────────────────────────── --}}
    <link rel="icon" type="image/x-icon"            href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/favicon-48x48.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"    href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest"                            href="/site.webmanifest">
    <meta name="theme-color" content="#6366f1">

    {{-- ── Fonts ─────────────────────────────────────────────────────── --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    {{-- ── Assets ────────────────────────────────────────────────────── --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet"
          href="{{ asset('packages/devrabiul/laravel-toaster-magic/css/laravel-toaster-magic.min.css') }}">

    {{-- ── Cloudflare Turnstile ────────────────────────────────────────── --}}
    <script>
        window.onloadTurnstileCallback = function () {
            document.dispatchEvent(new Event('turnstile-ready'));
        };
    </script>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback&render=explicit"
            async defer></script>

    {{-- ── Cloudflare Web Analytics ───────────────────────────────────── --}}
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
            data-cf-beacon='{"token": "f2128a0e0382482db6fc81cedc72c3d0"}'></script>

</head>

<body
    class="bg-slate-50 dark:bg-[#080b14] text-slate-900 dark:text-slate-100 font-inter antialiased transition-colors duration-300"
    x-data
>
@include('components.header')

<main class="min-h-screen pt-20">
    {{ $slot }}
</main>

@include('components.footer')

<x-button-to-top/>

@livewireScripts

<script src="{{ asset('packages/devrabiul/laravel-toaster-magic/js/livewire-v3/laravel-toaster-magic.js') }}"></script>
<script
    src="{{ asset('packages/devrabiul/laravel-toaster-magic/js/livewire-v3/livewire-toaster-magic-v3.js') }}"></script>
{{--{!! ToastMagic::scripts() !!}--}}

</body>
</html>
