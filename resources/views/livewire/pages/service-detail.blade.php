<div>
    <section class="py-20">
        <div class="max-w-3xl mx-auto px-6">
            <a href="{{ localized_route('home') }}#services"
               class="inline-flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 mb-10 transition-colors reveal">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
                {{ __('messages.back_to_services') }}
            </a>

            <div class="p-10 rounded-3xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] shadow-xl shadow-slate-100/50 dark:shadow-black/20 reveal reveal-delay-1">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500/10 to-sky-500/10 dark:from-indigo-500/20 dark:to-sky-500/20 flex items-center justify-center mb-8">
                    <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $service->icon }}"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">{{ $service->translated_title }}</h1>
                <p class="text-slate-500 dark:text-slate-400 leading-relaxed text-lg">{{ $service->translated_description }}</p>
            </div>
        </div>
    </section>
</div>
