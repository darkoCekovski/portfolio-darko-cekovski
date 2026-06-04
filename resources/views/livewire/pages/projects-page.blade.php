<div>
    <section class="py-20 bg-slate-50/50 dark:bg-white/[0.02] border-b border-slate-200 dark:border-white/10">
        <div class="max-w-6xl mx-auto px-6">
            <span class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-3 block">{{ __('messages.projects_eyebrow') }}</span>
            <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-white">{{ __('messages.projects_title') }}</h1>
            <p class="mt-4 text-slate-500 dark:text-slate-400 max-w-xl">{{ __('messages.projects_page_subtitle') }}</p>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Search + Filter bar --}}
            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                <div class="relative flex-1 max-w-sm">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"/>
                    </svg>
                    <input type="text" wire:model.live.debounce.300ms="search"
                           placeholder="{{ __('messages.search_projects') }}"
                           class="w-full pl-10 pr-9 py-2.5 rounded-xl text-sm border border-slate-200 dark:border-white/10
                                  bg-white dark:bg-white/[0.03] text-slate-800 dark:text-slate-200
                                  placeholder-slate-400 dark:placeholder-slate-500
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                  transition-all duration-200">
                    @if($search)
                    <button wire:click="clearSearch" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    @endif
                </div>

                {{-- Tech filters --}}
                <div class="flex flex-wrap gap-2">
                    <button wire:click="toggleFilter('all')"
                            class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200
                                   {{ empty($filterTechs) ? 'bg-indigo-600 text-white shadow-sm shadow-indigo-500/20' : 'bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-white/10 border border-slate-200 dark:border-white/10' }}">
                        {{ __('messages.filter_all') }}
                    </button>
                    @foreach($technologies as $tech)
                    <button wire:click="toggleFilter(@js($tech))"
                            class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200
                                   {{ in_array($tech, $filterTechs) ? 'bg-indigo-600 text-white shadow-sm shadow-indigo-500/20' : 'bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-white/10 border border-slate-200 dark:border-white/10' }}">
                        {{ $tech }}
                    </button>
                    @endforeach
                </div>
            </div>

            {{-- Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($projects as $i => $project)
                <a href="{{ localized_route('project.detail', ['id' => $project->id]) }}"
                   class="group rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08]
                          overflow-hidden hover:border-indigo-300 dark:hover:border-indigo-500/40
                          transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10 card-glow reveal">
                    @if($project->thumbnail)
                    <div class="aspect-video overflow-hidden bg-slate-100 dark:bg-white/5">
                        <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    @else
                    <div class="aspect-video bg-gradient-to-br from-indigo-500/10 to-sky-500/10 dark:from-indigo-500/20 dark:to-sky-500/20 flex items-center justify-center">
                        <span class="text-4xl font-black text-indigo-300 dark:text-indigo-600">{{ substr($project->title, 0, 1) }}</span>
                    </div>
                    @endif
                    <div class="p-5">
                        <h2 class="font-semibold text-slate-900 dark:text-white mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                            {{ $project->title }}
                        </h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2 mb-4">{{ $project->description }}</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($project->tech_stack ?? [] as $tech)
                            <span class="px-2 py-0.5 text-xs rounded-md bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 font-medium border border-indigo-100 dark:border-indigo-500/20">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-20">
                    <div class="text-5xl mb-4">🔍</div>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">{{ __('messages.no_projects') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
