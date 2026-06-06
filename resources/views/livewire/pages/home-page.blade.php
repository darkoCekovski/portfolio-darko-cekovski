<div x-data="serviceModal()" @open-service-modal.window="open($event.detail.name)">
    {{-- ── HERO ──────────────────────────────────────────────────────────── --}}
    <section class="relative min-h-[92vh] flex items-center overflow-hidden">
        {{-- Background gradient blobs --}}
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div
                class="absolute -top-40 -right-40 w-[600px] h-[600px] rounded-full bg-indigo-500/10 dark:bg-indigo-500/5 blur-3xl"></div>
            <div
                class="absolute -bottom-40 -left-40 w-[500px] h-[500px] rounded-full bg-sky-500/10 dark:bg-sky-500/5 blur-3xl"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 py-24 w-full">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- ── Left: text ──────────────────────────────────────── --}}
                <div>
                    {{-- Eyebrow --}}
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-semibold
                        bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400
                        border border-emerald-200 dark:border-emerald-500/20 mb-6 reveal">
                        <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span></span>
                        {{ __('messages.hero_available') }}
                    </div>

                    {{-- Greeting + Name --}}
                    <p class="text-xl sm:text-2xl font-semibold text-slate-700 dark:text-slate-200 mb-3 reveal reveal-delay-1">
                        {{ __('messages.hero_greeting') }}
                    </p>
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-[1.05] tracking-tight text-slate-900 dark:text-white mb-6 reveal reveal-delay-2">
                        <span class="gradient-text">Darko Cekovski</span>
                    </h1>

                    {{-- Typewriter role --}}
                    <p class="text-xl text-slate-500 dark:text-slate-400 mb-4 reveal reveal-delay-2 whitespace-nowrap">
                        <span class="block sm:inline">{{ __('messages.hero_role_prefix') }}</span><span
                            data-typewriter='@json(__("messages.hero_roles"))'
                            class="font-semibold text-slate-700 dark:text-slate-200 typewriter-cursor"></span>
                    </p>

                    <p class="text-lg text-slate-500 dark:text-slate-400 max-w-xl mb-10 reveal reveal-delay-3">
                        {{ __('messages.hero_subtitle') }}
                    </p>

                    {{-- CTAs --}}
                    <div class="flex flex-wrap gap-4 reveal reveal-delay-4">
                        <a href="{{ localized_route('projects') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold text-sm
                              bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg shadow-indigo-500/25
                              transition-all duration-200 hover:-translate-y-0.5">
                            {{ __('messages.hero_cta') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                        <a href="{{ localized_route('contact') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold text-sm
                              bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10
                              text-slate-700 dark:text-slate-300 hover:border-indigo-300 dark:hover:border-indigo-500/50
                              transition-all duration-200 hover:-translate-y-0.5 shadow-sm">
                            {{ __('messages.contact_cta') }}
                        </a>
                    </div>

                    {{-- Stats --}}
                    <div
                        class="flex flex-wrap gap-8 mt-14 pt-10 border-t border-slate-200 dark:border-white/10 reveal reveal-delay-5"
                        x-data="heroStats()" x-init="init()">
                        @foreach([
                            ['stat_years',    6,  '+', __('messages.stat_years')],
                            ['stat_skills',   12, '+', __('messages.stat_skills')],
                            ['stat_projects', 20, '+', __('messages.stat_projects')],
                        ] as [$key, $target, $suffix, $label])
                            <div>
                                <div class="text-3xl font-black text-slate-900 dark:text-white">
                                    <span data-stat="{{ $target }}" data-suffix="{{ $suffix }}">0{{ $suffix }}</span>
                                </div>
                                <div class="text-sm text-slate-400 dark:text-slate-500 mt-0.5">{{ $label }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- ── Right: image / code card ─────────────────────────── --}}
                <div class="flex items-center justify-center reveal reveal-delay-2">
                    {{-- Fallback: floating code card --}}
                    <div class="relative w-full max-w-sm mx-auto">
                        {{-- Glow behind card --}}
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-br from-indigo-500/20 to-sky-500/20 blur-3xl"></div>

                        {{-- Code card --}}
                        <div
                            class="relative rounded-3xl bg-white/80 dark:bg-white/[0.04] border border-slate-200 dark:border-white/10 shadow-2xl p-6 backdrop-blur-xl">
                            {{-- Window dots --}}
                            <div class="flex gap-1.5 mb-5">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                            </div>

                            {{-- Code --}}
                            <div class="space-y-2 font-mono text-xs leading-relaxed">
                                <div><span class="text-indigo-400">class</span> <span
                                        class="text-sky-400">Portfolio</span> <span
                                        class="text-slate-400 dark:text-slate-500">{</span></div>
                                <div class="pl-4">
                                    <span class="text-emerald-400">public</span>
                                    <span class="text-indigo-300"> string</span>
                                    <span class="text-slate-700 dark:text-slate-300"> $name</span>
                                    <span class="text-slate-400 dark:text-slate-500"> = </span>
                                    <span class="text-amber-400">'Darko Cekovski'</span><span
                                        class="text-slate-400 dark:text-slate-500">;</span>
                                </div>
                                <div class="pl-4">
                                    <span class="text-emerald-400">public</span>
                                    <span class="text-indigo-300"> array</span>
                                    <span class="text-slate-700 dark:text-slate-300"> $stack</span>
                                    <span class="text-slate-400 dark:text-slate-500"> = [</span>
                                </div>
                                @foreach(['Laravel', 'Livewire', 'Tailwind CSS', 'Alpine.js'] as $tech)
                                    <div class="pl-8"><span class="text-amber-400">'{{ $tech }}'</span><span
                                            class="text-slate-400 dark:text-slate-500">,</span></div>
                                @endforeach
                                <div class="pl-4"><span class="text-slate-400 dark:text-slate-500">];</span></div>
                                <div class="pt-1 pl-4">
                                    <span class="text-emerald-400">public function</span>
                                    <span class="text-sky-400"> build</span><span
                                        class="text-slate-400 dark:text-slate-500">(): </span><span
                                        class="text-indigo-300">string</span>
                                </div>
                                <div class="pl-4"><span class="text-slate-400 dark:text-slate-500">{</span></div>
                                <div class="pl-8">
                                    <span class="text-indigo-400">return</span>
                                    <span class="text-amber-400"> 'something great'</span><span
                                        class="text-slate-400 dark:text-slate-500">;</span>
                                </div>
                                <div class="pl-4"><span class="text-slate-400 dark:text-slate-500">}</span></div>
                                <div><span class="text-slate-400 dark:text-slate-500">}</span></div>
                            </div>

                            {{-- Blinking cursor --}}
                            <div class="mt-3 flex items-center gap-2">
                                <span class="text-indigo-400 font-mono text-sm animate-pulse">▋</span>
                                <div class="h-px flex-1 bg-indigo-500/20"></div>
                            </div>
                        </div>

                        {{-- Floating badge bottom — centered --}}
                        {{-- Floating badge bottom — centered --}}
                        <div class="absolute -bottom-5 left-1/2 -translate-x-1/2 z-10 px-3 py-1.5 rounded-full whitespace-nowrap
                            bg-white dark:bg-[#0f1424] border border-slate-200 dark:border-white/10 shadow-lg text-xs font-mono font-semibold text-indigo-600 dark:text-indigo-400">
                            {{ __('messages.hero_card_badge') }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ── SERVICES ─────────────────────────────────────────────────────── --}}
    <section id="services" class="py-24 bg-slate-50/50 dark:bg-white/[0.02] scroll-mt-24">
        <div class="max-w-6xl mx-auto px-6">
            <x-section-header
                :eyebrow="__('messages.services_eyebrow')"
                :title="__('messages.services_title')"
                :subtitle="__('messages.services_subtitle')"
                :centered="true"
            />
{{--            <div class="mb-16 reveal text-center">--}}
{{--                <span--}}
{{--                    class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-3 block">{{ __('messages.services_eyebrow') }}</span>--}}
{{--                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-4">{{ __('messages.services_title') }}</h2>--}}
{{--                <p class="text-slate-500 dark:text-slate-400 max-w-xl mx-auto">{{ __('messages.services_subtitle') }}</p>--}}
{{--            </div>--}}
            @livewire('services')
        </div>
    </section>

    {{-- ── ABOUT TEASER ─────────────────────────────────────────────────── --}}
    <section class="py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                {{--                left side--}}
                <div class="reveal">
                    <span
                        class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-4 block">{{ __('messages.about_eyebrow') }}</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-6 leading-tight">{{ __('messages.about_title') }}</h2>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-8">{{ __('messages.about_text') }}</p>
                    <a href="{{ localized_route('about') }}"
                       class="group inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 transition-colors duration-200">
                        {{ __('messages.about_cta') }}
                        <span class="inline-block w-4 ml-2 overflow-visible">
                            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1.5"
                                 fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                            </svg>
                        </span>
                    </a>
                </div>
                {{--            right side--}}
                <div class="grid grid-cols-2 gap-4 reveal reveal-delay-2">

                    {{-- Location --}}
                    <div
                        class="p-5 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] card-glow transition-transform duration-200">
                        <div
                            class="w-9 h-9 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="1.75"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z"/>
                            </svg>
                        </div>
                        <div
                            class="font-semibold text-slate-800 dark:text-slate-200 text-sm">{{ __('messages.about_location_label') }}</div>
                        <div
                            class="text-xs text-slate-400 dark:text-slate-500 mt-0.5">{{ __('messages.about_location_value') }}</div>
                    </div>

                    {{-- Experience --}}
                    <div
                        class="p-5 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] card-glow transition-transform duration-200">
                        <div
                            class="w-9 h-9 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="1.75"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                            </svg>
                        </div>
                        <div
                            class="font-semibold text-slate-800 dark:text-slate-200 text-sm">{{ __('messages.about_experience') }}</div>
                        <div
                            class="text-xs text-slate-400 dark:text-slate-500 mt-0.5">{{ __('messages.about_exp_value') }}</div>
                    </div>

                    {{-- Education --}}
                    <div
                        class="p-5 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] card-glow transition-transform duration-200">
                        <div
                            class="w-9 h-9 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="1.75"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/>
                            </svg>
                        </div>
                        <div
                            class="font-semibold text-slate-800 dark:text-slate-200 text-sm">{{ __('messages.about_edu_label') }}</div>
                        <div
                            class="text-xs text-slate-400 dark:text-slate-500 mt-0.5">{{ __('messages.about_edu_value') }}</div>
                    </div>

                    {{-- Languages --}}
                    <div
                        class="p-5 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] card-glow transition-transform duration-200">
                        <div
                            class="w-9 h-9 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="1.75"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802"/>
                            </svg>
                        </div>
                        <div
                            class="font-semibold text-slate-800 dark:text-slate-200 text-sm">{{ __('messages.about_lang_label') }}</div>
                        <div
                            class="text-xs text-slate-400 dark:text-slate-500 mt-0.5">{{ __('messages.about_lang_value') }}</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ── SKILLS ────────────────────────────────────────────────────────── --}}
    <section class="py-24 bg-slate-50/50 dark:bg-white/[0.02]">
        <div class="max-w-6xl mx-auto px-6">
            @livewire('skills-sphere')
        </div>
    </section>

    {{-- ── PROJECTS PREVIEW ─────────────────────────────────────────────── --}}
    <section class="py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-end mb-12 reveal">
                <div class="flex-1">
                    <span
                        class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-3 block">{{ __('messages.projects_eyebrow') }}</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">{{ __('messages.projects_title') }}</h2>
                </div>
                {{-- Desktop link --}}
                <a href="{{ localized_route('projects') }}"
                   class="group hidden sm:inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 transition-colors duration-200">
                    {{ __('messages.projects_all_cta') }}
                    <span class="inline-block w-4 ml-2 overflow-visible">
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1.5" fill="none"
                             stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                        </svg>
                    </span>
                </a>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($projects as $i => $project)
                    <a href="{{ localized_route('project.detail', ['id' => $project->id]) }}"
                       class="group rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08]
                      overflow-hidden hover:border-indigo-300 dark:hover:border-indigo-500/40
                      transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10
                      card-glow reveal reveal-delay-{{ $i + 1 }}">
                        @if($project->thumbnail)
                            <div class="aspect-video overflow-hidden bg-slate-100 dark:bg-white/5">
                                <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="font-semibold text-slate-900 dark:text-white mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                {{ $project->title }}
                            </h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2 mb-4">{{ $project->description }}</p>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                    <span
                                        class="px-2 py-0.5 text-xs rounded-md bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 font-medium border border-indigo-100 dark:border-indigo-500/20">
                                    {{ $tech }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Mobile button (below cards) --}}
            <div class="mt-10 flex justify-center sm:hidden reveal">
                <a href="{{ localized_route('projects') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold text-sm
                      bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg shadow-indigo-500/25
                      transition-all duration-200 hover:-translate-y-0.5">
                    {{ __('messages.projects_all_cta') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ── TESTIMONIALS ─────────────────────────────────────────────────── --}}
    <section class="py-24">
        <div class="max-w-6xl mx-auto px-6">
            @livewire('testimonials')
        </div>
    </section>

    {{-- ── CONTACT CTA ──────────────────────────────────────────────────── --}}
    <section class="py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div
                class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-indigo-600 via-blue-600 to-sky-500 p-12 text-center reveal">
                <div class="absolute inset-0 opacity-10 noise"></div>
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4 relative">{{ __('messages.contact_title') }}</h2>
                <p class="text-indigo-100 text-lg mb-8 max-w-xl mx-auto relative">{{ __('messages.contact_text') }}</p>
                <a href="{{ localized_route('contact') }}"
                   class="relative inline-flex items-center gap-2 px-8 py-3.5 rounded-xl font-semibold text-sm
                          bg-white text-indigo-600 hover:bg-indigo-50 shadow-xl shadow-black/20
                          transition-all duration-200 hover:-translate-y-0.5">
                    {{ __('messages.contact_cta') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <script>
        function heroStats() {
            return {
                init() {
                    const els = this.$el.querySelectorAll('[data-stat]');
                    if (!els.length) return;

                    const setFinal = () => els.forEach(el => {
                        el.textContent = el.dataset.stat + (el.dataset.suffix || '');
                    });

                    if (sessionStorage.getItem('hero_stats_done')) {
                        setFinal();
                        return;
                    }

                    const run = () => {
                        sessionStorage.setItem('hero_stats_done', '1');
                        els.forEach(el => {
                            const target = parseInt(el.dataset.stat, 10);
                            const suffix = el.dataset.suffix || '';
                            const dur = 2800;
                            const start = performance.now();
                            const easeOut = t => 1 - Math.pow(1 - t, 3);
                            el.textContent = '0' + suffix;
                            (function tick(now) {
                                const p = Math.min(1, (now - start) / dur);
                                el.textContent = Math.round(easeOut(p) * target) + suffix;
                                if (p < 1) requestAnimationFrame(tick);
                            })(start);
                        });
                    };

                    setTimeout(run, 1800);
                }
            };
        }
    </script>

    {{-- ── SERVICE MODAL ─────────────────────────────────────────────────── --}}
    <div x-show="show" x-cloak @keydown.escape.window="close()"
         class="fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-4"
         role="dialog" aria-modal="true">

        {{-- Backdrop --}}
        <div x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-end="opacity-0"
             @click="close()"
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

            <template x-if="loading">
                <div class="p-10 text-center">
                    <div
                        class="w-10 h-10 border-2 border-indigo-500 border-t-transparent rounded-full animate-spin mx-auto"></div>
                </div>
            </template>

            <template x-if="!loading && service">
                <div>
                    <div
                        class="relative bg-gradient-to-br from-indigo-500/10 via-blue-500/5 to-sky-500/10 dark:from-indigo-500/20 dark:via-blue-500/10 dark:to-sky-500/10 p-8 pb-6">
                        <button @click="close()"
                                class="absolute top-4 right-4 w-8 h-8 rounded-lg flex items-center justify-center
                                       text-slate-400 hover:text-slate-700 dark:hover:text-white
                                       hover:bg-white/50 dark:hover:bg-white/10 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <div
                            class="w-14 h-14 rounded-2xl bg-white dark:bg-white/10 shadow-sm flex items-center justify-center mb-5">
                            <svg class="w-7 h-7 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor"
                                 stroke-width="1.75" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" :d="service.icon"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white" x-text="service.title"></h2>
                    </div>
                    <div class="p-8">
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed" x-text="service.description"></p>
                        <div class="mt-8">
                            <a href="{{ localized_route('contact') }}"
                               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm
                                      bg-indigo-600 hover:bg-indigo-700 text-white shadow-sm shadow-indigo-500/20
                                      transition-all duration-200">
                                {{ __('messages.contact_cta') }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <script>
        function serviceModal() {
            return {
                show: false,
                loading: false,
                service: null,
                homeUrl: '{{ localized_route('home') }}',
                base: '{{ url(app()->getLocale() . '/service') }}',

                init() {
                    // Auto-open when arriving directly at /service/{name}
                    const auto = '{{ $openService ?? '' }}';
                    if (auto) {
                        this.load(auto);
                        // Make sure the services section sits behind the modal
                        this.$nextTick(() => this.scrollToServices('auto'));
                    }
                    // Close modal if the user presses the browser Back button
                    window.addEventListener('popstate', () => {
                        if (this.show) {
                            this.show = false;
                            document.body.style.overflow = '';
                        }
                    });
                },

                open(name) {
                    history.pushState({}, '', `${this.base}/${name}`);
                    this.load(name);
                },

                load(name) {
                    this.show = true;
                    this.loading = true;
                    this.service = null;
                    document.body.style.overflow = 'hidden';
                    fetch(`/api/services/${name}?locale={{ app()->getLocale() }}`)
                        .then(r => r.ok ? r.json() : Promise.reject())
                        .then(data => {
                            this.service = data;
                            this.loading = false;
                        })
                        .catch(() => {
                            this.loading = false;
                        });
                },

                close() {
                    this.show = false;
                    document.body.style.overflow = '';
                    history.pushState({}, '', this.homeUrl);
                    this.$nextTick(() => this.scrollToServices('smooth'));
                },

                scrollToServices(behavior) {
                    const el = document.getElementById('services');
                    if (el) el.scrollIntoView({behavior, block: 'start'});
                },
            };
        }
    </script>
</div>
