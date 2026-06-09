<div>
    <x-page-header
        :eyebrow="__('messages.projects_eyebrow')"
        :title="__('messages.projects_title')"
        :subtitle="__('messages.projects_page_subtitle')"
    />

    <x-page-section>

        {{-- Search + Filter bar --}}
        <div class="flex flex-col gap-4 mb-10">

            {{-- Search --}}
            <div class="relative flex-1 max-w-sm">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"/>
                </svg>
                <input type="text" wire:model.live.debounce.300ms="search"
                       placeholder="{{ __('messages.search_projects') }}"
                       class="w-full pl-10 pr-9 py-2.5 rounded-xl text-sm
                              border border-slate-200 dark:border-white/10
                              bg-white dark:bg-white/[0.03]
                              text-slate-800 dark:text-slate-200
                              placeholder-slate-400 dark:placeholder-slate-500
                              focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                              transition-all duration-200">
                @if($search)
                    <button wire:click="clearSearch"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400
                                   hover:text-slate-600 dark:hover:text-slate-200 transition-colors">
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
                               {{ empty($filterTechs)
                                  ? 'bg-indigo-600 text-white shadow-sm shadow-indigo-500/20'
                                  : 'bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-white/10 border border-slate-200 dark:border-white/10' }}">
                    {{ __('messages.filter_all') }}
                </button>
                @foreach($technologies as $tech)
                    <button wire:click="toggleFilter(@js($tech))"
                            class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200
                                   {{ in_array($tech, $filterTechs)
                                      ? 'bg-indigo-600 text-white shadow-sm shadow-indigo-500/20'
                                      : 'bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-white/10 border border-slate-200 dark:border-white/10' }}">
                        {{ $tech }}
                    </button>
                @endforeach
            </div>

        </div>

        {{-- Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $i => $project)
                <x-project-card :project="$project" :delay="($i % 3) + 1"/>
            @empty
                <div class="col-span-3 text-center py-20">
                    <svg class="w-12 h-12 text-slate-300 dark:text-slate-600 mx-auto mb-4"
                         fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"/>
                    </svg>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">{{ __('messages.no_projects') }}</p>
                </div>
            @endforelse
        </div>

    </x-page-section>
</div>
