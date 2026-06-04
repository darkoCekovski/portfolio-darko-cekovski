<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($services as $i => $service)
        <button type="button"
                @click="$dispatch('open-service-modal', { name: '{{ $service->name }}' })"
                class="group relative text-left p-6 rounded-2xl w-full
                   bg-white dark:bg-white/[0.03]
                   border border-slate-200 dark:border-white/[0.08]
                   hover:border-indigo-300 dark:hover:border-indigo-500/40
                   transition-all duration-300 hover:-translate-y-1
                   hover:shadow-xl hover:shadow-indigo-500/10 card-glow reveal reveal-delay-{{ $i + 1 }}">
            <div class="w-12 h-12 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center mb-5
                    group-hover:bg-indigo-100 dark:group-hover:bg-indigo-500/20 transition-colors duration-200">
                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $service->icon }}"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-slate-900 dark:text-white mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                {{ $service->translated_title }}
            </h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed">
                {{ \Illuminate\Support\Str::limit($service->translated_description, 90) }}
            </p>
            <div class="absolute bottom-5 right-5 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </div>
        </button>
    @endforeach
</div>
