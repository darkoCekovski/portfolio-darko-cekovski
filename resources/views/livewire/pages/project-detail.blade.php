<div>
    <x-page-section>
        <div class="max-w-4xl mx-auto">

            {{-- Back --}}
            <a href="{{ localized_route('projects') }}"
               class="group inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400
                      mb-10 transition-colors duration-200 reveal">
                <span class="inline-block w-4 mr-2 overflow-visible">
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1.5"
                         fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                    </svg>
                </span>
                {{ __('messages.projects_all_cta') }}
            </a>

            {{-- Title --}}
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white mb-6 reveal reveal-delay-1">
                {{ $project->title }}
            </h1>

            {{-- Thumbnail or placeholder --}}
            <div class="rounded-2xl overflow-hidden mb-10 reveal reveal-delay-2 aspect-video">
                @if($project->thumbnail)
                    <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-indigo-500/10 via-blue-500/10 to-sky-500/10
                                dark:from-indigo-500/20 dark:via-blue-500/20 dark:to-sky-500/20
                                flex items-center justify-center">
                        <svg class="w-20 h-20 text-indigo-300 dark:text-indigo-600/60"
                             fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3M5.25 21H18.75a2.25 2.25 0 0 0 2.25-2.25V5.25A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25v13.5A2.25 2.25 0 0 0 5.25 21z"/>
                        </svg>
                    </div>
                @endif
            </div>

            <div class="grid lg:grid-cols-3 gap-10">

                {{-- Description --}}
                <div class="lg:col-span-2 reveal reveal-delay-2">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-4">
                        {{ __('messages.project_description') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed whitespace-pre-line">
                        {{ $project->description }}
                    </p>

                    {{-- CTA buttons --}}
                    <div class="flex flex-wrap gap-3 mt-8">
                        @if($project->demo_url)
                            <x-primary-button href="{{ $project->demo_url }}" target="_blank" rel="noopener">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                                </svg>
                                {{ __('messages.project_detail_demo') }}
                            </x-primary-button>
                        @endif
                        @if($project->github_url)
                            <x-ghost-button href="{{ $project->github_url }}" target="_blank" rel="noopener">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.247a10 10 0 0 0-3.162 19.488c.5.092.682-.217.682-.482 0-.237-.009-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844a9.59 9.59 0 0 1 2.504.337c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0 0 12 2.247z"/>
                                </svg>
                                {{ __('messages.project_detail_github') }}
                            </x-ghost-button>
                        @endif
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-5 reveal reveal-delay-3">

                    {{-- Tech stack --}}
                    <x-about-card :title="__('messages.project_detail_tech')">
                        <x-slot name="icon">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/>
                            </svg>
                        </x-slot>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->tech_stack ?? [] as $tech)
                                <x-tech-badge>{{ $tech }}</x-tech-badge>
                            @endforeach
                        </div>
                    </x-about-card>

                    {{-- Repository --}}
                    <x-about-card :title="__('messages.project_detail_repository')">
                        <x-slot name="icon">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.25 9.75 16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25z"/>
                            </svg>
                        </x-slot>
                        @if($project->github_is_public)
                            <span
                                class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                {{ __('messages.badge_public') }}
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 dark:text-slate-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                {{ __('messages.badge_private') }}
                            </span>
                        @endif
                    </x-about-card>

                </div>
            </div>

        </div>
    </x-page-section>
</div>
