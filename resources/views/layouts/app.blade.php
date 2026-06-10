<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? __('messages.site_title') }}</title>
    <meta name="description" content="{{ $description ?? __('messages.hero_subtitle') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicons/favicon.svg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    {{--    {!! ToastMagic::styles() !!}--}}
    <link rel="stylesheet"
          href="{{ asset('packages/devrabiul/laravel-toaster-magic/css/laravel-toaster-magic.min.css') }}">

    <script>
        (() => {
            const t = localStorage.getItem('theme') || 'system';
            document.documentElement.setAttribute('data-theme', t);
            const dark = t === 'dark' || (t === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (dark) document.documentElement.classList.add('dark');
        })();
    </script>

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
{{--{!! ToastMagic::scripts() !!}--}}
<script src="{{ asset('packages/devrabiul/laravel-toaster-magic/js/livewire-v3/laravel-toaster-magic.js') }}"></script>
<script
    src="{{ asset('packages/devrabiul/laravel-toaster-magic/js/livewire-v3/livewire-toaster-magic-v3.js') }}"></script>
{!! ToastMagic::scripts() !!}
</body>
</html>
