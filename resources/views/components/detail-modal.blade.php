@props([
    'itemVar',
    'closeMethod' => 'close',
])

<div x-show="show" x-cloak @keydown.escape.window="{{ $closeMethod }}()"
     class="fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-4"
     role="dialog" aria-modal="true">

    {{-- Backdrop --}}
    <div x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-end="opacity-0"
         @click="{{ $closeMethod }}()"
         class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

    {{-- Panel --}}
    <div x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
         class="relative w-full max-w-lg rounded-3xl bg-white dark:bg-[#0f1424]
                border border-slate-200 dark:border-white/10 shadow-2xl overflow-hidden z-10">

        {{-- Loading state --}}
        <template x-if="loading">
            <div class="p-10 text-center">
                <div class="w-10 h-10 border-2 border-primary-500 border-t-transparent rounded-full animate-spin mx-auto"></div>
            </div>
        </template>

        {{-- Content --}}
        <template x-if="!loading && {{ $itemVar }}">
            <div class="relative">
                <button @click="{{ $closeMethod }}()"
                        class="absolute top-4 right-4 z-10 w-8 h-8 rounded-lg flex items-center justify-center
                               text-slate-400 hover:text-slate-700 dark:hover:text-white
                               hover:bg-white/50 dark:hover:bg-white/10 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </button>

                {{ $header }}
                {{ $slot }}
            </div>
        </template>
    </div>
</div>
