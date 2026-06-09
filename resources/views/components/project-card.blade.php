@props([
    'project' => null,
    'delay'   => 1,
])

<a href="{{ localized_route('project.detail', ['id' => $project->id]) }}"
   class="group rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08]
          overflow-hidden hover:border-indigo-300 dark:hover:border-indigo-500/40
          transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10
          reveal reveal-delay-{{ $delay }}">

    {{-- Image / Placeholder with badge overlay --}}
    <div class="relative aspect-video overflow-hidden">

        @if($project->thumbnail)
            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
            <div class="w-full h-full bg-gradient-to-br from-indigo-500/10 via-blue-500/10 to-sky-500/10
                        dark:from-indigo-500/20 dark:via-blue-500/20 dark:to-sky-500/20
                        flex items-center justify-center">
                <svg class="w-14 h-14 text-indigo-300 dark:text-indigo-600/60"
                     fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3M5.25 21H18.75a2.25 2.25 0 0 0 2.25-2.25V5.25A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25v13.5A2.25 2.25 0 0 0 5.25 21z"/>
                </svg>
            </div>
        @endif

        {{-- GitHub badge --}}
        <div class="absolute top-3 left-3">
            @if($project->github_is_public)
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold
                             bg-emerald-50/90 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400
                             backdrop-blur-sm border border-emerald-100 dark:border-emerald-500/20">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.769 0-5.452-.23-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/>
                    </svg>
                    {{ __('messages.badge_public') }}
                </span>
            @else
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold
                             bg-white/80 dark:bg-black/40 text-slate-500 dark:text-slate-400
                             backdrop-blur-sm border border-slate-200 dark:border-white/10">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25z"/>
                    </svg>
                    {{ __('messages.badge_private') }}
                </span>
            @endif
        </div>

    </div>

    {{-- Content --}}
    <div class="p-5">
        <h3 class="text-slate-900 dark:text-white font-semibold mb-2
                   group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
            {{ $project->title }}
        </h3>
        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">
            {{ $project->short_description }}
        </p>
        <div class="flex flex-wrap gap-1.5">
            @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                <x-tech-badge>{{ $tech }}</x-tech-badge>
            @endforeach
        </div>
    </div>

</a>
