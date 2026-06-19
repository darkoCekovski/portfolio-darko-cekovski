@props([
    'project' => null,
    'delay'   => 1,
])

<a href="{{ localized_route('project.detail', ['id' => $project->id]) }}"
   class="group rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08]
          overflow-hidden hover:border-primary-300 dark:hover:border-primary-500/40
          transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-500/10
          reveal reveal-delay-{{ $delay }}">

    {{-- Image / Placeholder with badge overlay --}}
    <div class="relative aspect-video overflow-hidden bg-slate-100 dark:bg-[#0d1117]">

        @if($project->thumbnail)
            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                 class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500 p-2">
        @else
            <div class="w-full h-full bg-gradient-to-br from-primary-500/10 via-blue-500/10 to-sky-500/10
                        dark:from-primary-500/20 dark:via-blue-500/20 dark:to-sky-500/20
                        flex items-center justify-center">
                <svg class="w-14 h-14 text-primary-300 dark:text-primary-600/60"
                     fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3M5.25 21H18.75a2.25 2.25 0 0 0 2.25-2.25V5.25A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25v13.5A2.25 2.25 0 0 0 5.25 21z"/>
                </svg>
            </div>
        @endif

        {{-- Badges overlay --}}
        <div class="absolute top-3 left-3 flex gap-1.5 flex-wrap">

            {{-- 1. Public / Private --}}
            @if($project->github_is_public)
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold
                 bg-emerald-50/90 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400
                 border border-emerald-100 dark:border-emerald-500/20">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="6" cy="6" r="2"/>
                        <circle cx="6" cy="18" r="2"/>
                        <circle cx="18" cy="6" r="2"/>
                        <path d="M6 8v8M11 18h3a2 2 0 0 0 2-2V8"/>
                    </svg>
                    {{ __('messages.badge_public') }}
                </span>
            @else
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold
                     bg-white/80 dark:bg-black/40 text-slate-500 dark:text-slate-400
                     border border-slate-200 dark:border-white/10">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25z"/>
                    </svg>
                    {{ __('messages.badge_private') }}
                </span>
            @endif

            {{-- 2. Live / Coming soon --}}
            @if($project->demo_url)
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold
                 bg-sky-50/90 dark:bg-sky-500/20 text-sky-700 dark:text-sky-400
                 border border-sky-100 dark:border-sky-500/20">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                    </svg>
                    {{ __('messages.badge_live') }}
                </span>
            @else
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold
                 bg-amber-50/90 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400
                 border border-amber-100 dark:border-amber-500/20">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/>
                    </svg>
                    {{ __('messages.badge_coming_soon') }}
                </span>
            @endif

            {{-- 3. Featured (only if true) --}}
            @if($project->is_featured)
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold
                     bg-primary-50/90 dark:bg-primary-500/20 text-primary-700 dark:text-primary-400
                     border border-primary-100 dark:border-primary-500/20">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"/>
                    </svg>
                    {{ __('messages.badge_featured') }}
                </span>
            @endif

        </div>

    </div>

    {{-- Content --}}
    <div class="p-5">
        <h3 class="text-slate-900 dark:text-white font-semibold mb-2
                   group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
            {{ $project->title }}
        </h3>
        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">
            {{ $project->localized_short_description }}
        </p>
        <div class="flex flex-wrap gap-1.5">
            @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                <x-tech-badge>{{ $tech }}</x-tech-badge>
            @endforeach
        </div>
    </div>

</a>
