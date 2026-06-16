<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale ?? 'en') }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $code }} — {{ config('app.name', 'Darko Cekovski') }}</title>
    <script>
        (() => {
            const t = localStorage.getItem('theme') || 'system';
            document.documentElement.setAttribute('data-theme', t);
            const dark = t === 'dark' || (t === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (dark) document.documentElement.classList.add('dark');
        })();
    </script>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-white dark:bg-[#080b14] antialiased">

{{-- Minimal header --}}
<header class="max-w-6xl mx-auto px-6 py-5 flex items-center justify-between">
    <a href="{{ url('/') }}" class="flex items-center gap-2 font-bold text-lg">
            <span class="w-7 h-7 rounded-md bg-gradient-to-br from-indigo-500 via-blue-500 to-sky-400
                         flex items-center justify-center text-white text-xs font-black">D</span>
        <span class="text-slate-700 dark:text-slate-300">Darko Cekovski</span>
    </a>
</header>

{{-- Error content --}}
<main class="min-h-[75vh] flex items-center justify-center py-20 px-4">
    <div class="text-center max-w-lg mx-auto">

        {{-- Big gradient code --}}
        <div class="text-[9rem] sm:text-[12rem] font-black leading-none mb-2 select-none gradient-text">
            {{ $code }}
        </div>

        {{-- Icon --}}
        <div class="w-16 h-16 rounded-2xl bg-indigo-50 dark:bg-indigo-500/10
                        flex items-center justify-center mx-auto mb-6">
            {!! $icon !!}
        </div>

        {{-- Title --}}
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-4">
            {{ ($locale ?? 'en') === 'de' ? $title_de : $title_en }}
        </h1>

        {{-- Message --}}
        <p class="text-slate-500 dark:text-slate-400 text-lg mb-10">
            {{ ($locale ?? 'en') === 'de' ? $message_de : $message_en }}
        </p>

        {{-- CTAs --}}
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ url('/') }}"
               class="inline-flex items-center gap-2 h-11 px-6 rounded-xl font-semibold text-sm
                          bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg shadow-indigo-500/25
                          transition-all duration-200 hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12 11.204 3.045c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75"/>
                </svg>
                {{ ($locale ?? 'en') === 'de' ? 'Zur Startseite' : 'Back to home' }}
            </a>

            @if($code !== 503)
                <a href="{{ url('/' . ($locale ?? 'en') . '/contact') }}"
                   class="inline-flex items-center gap-2 h-11 px-6 rounded-xl font-semibold text-sm
                              border border-slate-200 dark:border-white/10
                              text-slate-700 dark:text-slate-300 bg-white dark:bg-white/[0.03]
                              hover:border-indigo-300 dark:hover:border-indigo-500/40
                              hover:text-indigo-600 dark:hover:text-indigo-400
                              transition-all duration-200 hover:-translate-y-0.5">
                    {{ ($locale ?? 'en') === 'de' ? 'Kontakt aufnehmen' : 'Get in touch' }}
                </a>
            @endif
        </div>

    </div>
</main>

{{-- Minimal footer --}}
<footer class="text-center py-6 text-xs text-slate-400 dark:text-slate-600">
    © {{ date('Y') }} Darko Cekovski
</footer>

@vite(['resources/js/app.js'])
</body>
</html>
