<div>
    {{-- Page header --}}
    <section class="py-20 bg-slate-50/50 dark:bg-white/[0.02] border-b border-slate-200 dark:border-white/10">
        <div class="max-w-6xl mx-auto px-6">
            <span
                class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-3 block reveal">{{ __('messages.about_eyebrow') }}</span>
            <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-white mb-4 reveal reveal-delay-1">{{ __('messages.about_title') }}</h1>
            <p class="text-slate-500 dark:text-slate-400 max-w-xl reveal reveal-delay-2">{{ __('messages.about_page_subtitle') }}</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid lg:grid-cols-5 gap-16">

                {{-- ── LEFT: main content ─────────────────────────────── --}}
                <div class="lg:col-span-3 space-y-10">

                    <div class="reveal">
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-4">{{ __('messages.about_who_title') }}</h2>
                        <p class="text-slate-500 dark:text-slate-400 leading-relaxed">{{ __('messages.about_text') }}</p>
                    </div>

                    <div class="reveal reveal-delay-1">
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-4">{{ __('messages.about_passion_title') }}</h2>
                        <p class="text-slate-500 dark:text-slate-400 leading-relaxed">{{ __('messages.about_passion_text') }}</p>
                    </div>

                    <div class="reveal reveal-delay-2">
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-4">{{ __('messages.about_goal_title') }}</h2>
                        <p class="text-slate-500 dark:text-slate-400 leading-relaxed">{{ __('messages.about_goal_text') }}</p>
                    </div>

                    {{-- Experience timeline --}}
                    <div
                        class="p-6 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] reveal reveal-delay-2"
                        x-data="{ open: false }">
                        <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-6">{{ __('messages.about_experience') }}</h3>

                        <div
                            class="space-y-7 relative before:absolute before:left-[7px] before:top-2 before:bottom-2 before:w-px before:bg-slate-200 dark:before:bg-white/10">

                            {{-- ── Current dev roles (always visible) ──────────────── --}}
                            @foreach([
                                ['02/2022 – '.__('messages.exp_present'), 'Fireswitch Media B.V.', __('messages.exp_fireswitch_role'), 'exp_fireswitch_bullets', true],
                                ['03/2020 – '.__('messages.exp_present'), __('messages.exp_freelance'), __('messages.exp_fireswitch_role'), 'exp_freelance_bullets', true],
                            ] as [$years, $company, $role, $bulletsKey, $active])
                                <div class="flex gap-4 relative">
                                    <div
                                        class="w-3.5 h-3.5 rounded-full border-2 border-indigo-500 bg-white dark:bg-[#080b14] flex-shrink-0 mt-1 relative z-10"></div>
                                    <div class="flex-1">
                                        <div class="text-xs text-indigo-500 font-bold">{{ $years }}</div>
                                        <div
                                            class="font-bold text-slate-800 dark:text-slate-200 text-sm mt-0.5">{{ $company }}</div>
                                        <div class="text-xs text-indigo-400 font-medium mb-3">{{ $role }}</div>
                                        <ul class="space-y-1.5">
                                            @foreach(__('messages.'.$bulletsKey) as $bullet)
                                                <li class="flex gap-2 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                                                    <span
                                                        class="text-indigo-400 flex-shrink-0 mt-0.5">›</span>{{ $bullet }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                            {{-- ── Earlier career (collapsible) ─────────────────────── --}}
                            <div class="relative">
                                <div class="overflow-hidden transition-all duration-500 space-y-7"
                                     :style="open ? 'max-height: 1600px' : 'max-height: 60px'">

                                    @foreach([
                                        [__('messages.exp_role_sales_marketing'),  __('messages.exp_role_sales_marketing_co'),  'exp_role_sales_marketing_bullets'],
                                        [__('messages.exp_role_production_malta'), __('messages.exp_role_production_malta_co'), 'exp_role_production_malta_bullets'],
                                        [__('messages.exp_role_sales'),            __('messages.exp_role_sales_co'),            'exp_role_sales_bullets'],
                                        [__('messages.exp_role_prod_manager'),     __('messages.exp_role_prod_manager_co'),     'exp_role_prod_manager_bullets'],
                                        [__('messages.exp_role_prod_specialist'),  __('messages.exp_role_prod_specialist_co'),  'exp_role_prod_specialist_bullets'],
                                    ] as [$title, $company, $bulletsKey])
                                        <div class="flex gap-4 relative">
                                            <div
                                                class="w-3.5 h-3.5 rounded-full border-2 border-slate-300 dark:border-slate-600 bg-white dark:bg-[#080b14] flex-shrink-0 mt-1 relative z-10"></div>
                                            <div class="flex-1">
                                                <div
                                                    class="font-bold text-slate-700 dark:text-slate-300 text-sm">{{ $title }}</div>
                                                <div
                                                    class="text-xs text-slate-400 dark:text-slate-500 mb-2">{{ $company }}</div>
                                                <ul class="space-y-1.5">
                                                    @foreach(__('messages.'.$bulletsKey) as $bullet)
                                                        <li class="flex gap-2 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                                                            <span
                                                                class="text-indigo-400 flex-shrink-0 mt-0.5">›</span>{{ $bullet }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Fade overlay when collapsed --}}
                                <div x-show="!open"
                                     class="absolute inset-x-0 bottom-0 h-20 pointer-events-none bg-gradient-to-t from-white dark:from-[#0b1020] to-transparent"></div>
                            </div>

                            {{-- Toggle --}}
                            <button @click="open = !open" type="button"
                                    class="group inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 transition-colors duration-200">
                                <span
                                    x-text="open ? '{{ __('messages.show_less') }}' : '{{ __('messages.show_more_history') }}'"></span>
                                <span class="inline-block w-4 ml-2 overflow-visible">
                                    <svg class="w-4 h-4 transition-transform duration-200"
                                         :class="open ? 'rotate-180' : 'group-hover:translate-y-0.5'"
                                         fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                                    </svg>
                                </span>
                            </button>

                        </div>
                    </div>

                    {{-- CTAs --}}
                    <div class="flex gap-4 pt-2 reveal reveal-delay-4">
                        <x-primary-button href="{{ localized_route('contact') }}" size="sm">
                            {{ __('messages.contact_cta') }}
                        </x-primary-button>
                        @livewire('download-cv')
                    </div>
                </div>

                {{-- ── RIGHT: sidebar cards ────────────────────────────── --}}
                <div class="lg:col-span-2 space-y-5">

                    {{-- Profile photo placeholder --}}
                    <div class="reveal flex items-center justify-center">
                        @if(file_exists(public_path('images/profile.png')))
                            <div class="relative inline-block">
                                {{-- Ambient glow blobs behind photo --}}
                                <div class="absolute inset-0 -z-10 overflow-visible">
                                    <div class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-indigo-500/15 dark:bg-indigo-500/10 blur-3xl"></div>
                                    <div class="absolute -bottom-16 -left-16 w-56 h-56 rounded-full bg-sky-500/15 dark:bg-sky-500/10 blur-3xl"></div>
                                </div>
                                {{-- Image --}}
                                <img src="{{ asset('images/profile.png') }}" alt="Darko Cekovski"
                                     class="relative z-10 w-full max-w-[200px]">
                           </div>
                        @else
                            <div class="flex flex-col items-center gap-3 text-slate-300 dark:text-slate-600 py-8">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0zM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                                <span class="text-xs font-medium">{{ __('messages.about_photo_placeholder') }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Location --}}
                    <div
                        class="p-5 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] reveal reveal-delay-1 hover:shadow-lg hover:shadow-indigo-500/10 hover:border-indigo-300 dark:hover:border-indigo-500/40 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">{{ __('messages.about_location_label') }}</h3>
                        </div>
                        <p class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-1">{{ __('messages.about_location_detail') }}</p>
                        <p class="text-xs text-slate-400 dark:text-slate-500 leading-relaxed">{{ __('messages.about_location_region') }}</p>
                    </div>

                    {{-- Focus / Experience --}}
                    <div
                        class="p-5 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] reveal reveal-delay-2 hover:shadow-lg hover:shadow-indigo-500/10 hover:border-indigo-300 dark:hover:border-indigo-500/40 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div
                                class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/>
                                </svg>
                            </div>
                            <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">{{ __('messages.about_focus_label') }}</h3>
                        </div>
                        <div class="space-y-3">
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span
                                        class="font-semibold text-slate-700 dark:text-slate-300">{{ __('messages.about_frontend') }}</span>
                                    <span class="text-indigo-500 font-bold">6 {{ __('messages.about_years') }}</span>
                                </div>
                                <div class="h-1.5 rounded-full bg-slate-100 dark:bg-white/10 overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-sky-400"
                                         style="width:90%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span
                                        class="font-semibold text-slate-700 dark:text-slate-300">{{ __('messages.about_backend') }}</span>
                                    <span class="text-indigo-500 font-bold">2 {{ __('messages.about_years') }}</span>
                                </div>
                                <div class="h-1.5 rounded-full bg-slate-100 dark:bg-white/10 overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-sky-400"
                                         style="width:33%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Education --}}
                    <div
                        class="p-6 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] reveal reveal-delay-3 hover:-translate-y-1 hover:shadow-lg hover:shadow-indigo-500/10 hover:border-indigo-300 dark:hover:border-indigo-500/40 transition-all duration-300"
                        x-data="{ open: false }">
                        <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-6">{{ __('messages.about_edu_label') }}</h3>

                        <div
                            class="space-y-6 relative before:absolute before:left-[7px] before:top-2 before:bottom-2 before:w-px before:bg-slate-200 dark:before:bg-white/10">

                            {{-- Always visible: Frontend Academy --}}
                            <div class="flex gap-4 relative">
                                <div
                                    class="w-3.5 h-3.5 rounded-full border-2 border-indigo-500 bg-white dark:bg-[#080b14] flex-shrink-0 mt-1 relative z-10"></div>
                                <div class="flex-1">
                                    <div
                                        class="font-bold text-slate-800 dark:text-slate-200 text-sm">{{ __('messages.edu_academy_title') }}</div>
                                    <div
                                        class="text-xs text-indigo-400 font-medium mb-2">{{ __('messages.edu_academy_co') }}</div>
                                    <ul class="space-y-1.5">
                                        @foreach(__('messages.edu_academy_bullets') as $bullet)
                                            <li class="flex gap-2 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                                                <span class="text-indigo-400 flex-shrink-0 mt-0.5">›</span>{{ $bullet }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            {{-- Collapsible: degree + high school --}}
                            <div class="relative">
                                <div class="overflow-hidden transition-all duration-500 space-y-6"
                                     :style="open ? 'max-height: 800px' : 'max-height: 40px'">

                                    {{-- Bachelor's --}}
                                    <div class="flex gap-4 relative">
                                        <div
                                            class="w-3.5 h-3.5 rounded-full border-2 border-slate-300 dark:border-slate-600 bg-white dark:bg-[#080b14] flex-shrink-0 mt-1 relative z-10"></div>
                                        <div class="flex-1">
                                            <div
                                                class="font-bold text-slate-700 dark:text-slate-300 text-sm">{{ __('messages.edu_bachelor_title') }}</div>
                                            <div
                                                class="text-xs text-slate-400 dark:text-slate-500 mb-2">{{ __('messages.edu_bachelor_co') }}</div>
                                            <ul class="space-y-1.5">
                                                @foreach(__('messages.edu_bachelor_bullets') as $bullet)
                                                    <li class="flex gap-2 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                                                        <span
                                                            class="text-indigo-400 flex-shrink-0 mt-0.5">›</span>{{ $bullet }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- High school --}}
                                    <div class="flex gap-4 relative">
                                        <div
                                            class="w-3.5 h-3.5 rounded-full border-2 border-slate-300 dark:border-slate-600 bg-white dark:bg-[#080b14] flex-shrink-0 mt-1 relative z-10"></div>
                                        <div class="flex-1">
                                            <div
                                                class="font-bold text-slate-700 dark:text-slate-300 text-sm">{{ __('messages.edu_highschool_title') }}</div>
                                            <div
                                                class="text-xs text-slate-400 dark:text-slate-500 mb-2">{{ __('messages.edu_highschool_co') }}</div>
                                            <ul class="space-y-1.5">
                                                @foreach(__('messages.edu_highschool_bullets') as $bullet)
                                                    <li class="flex gap-2 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                                                        <span
                                                            class="text-indigo-400 flex-shrink-0 mt-0.5">›</span>{{ $bullet }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{-- Fade when collapsed --}}
                                <div x-show="!open"
                                     class="absolute inset-x-0 bottom-0 h-16 pointer-events-none
                        bg-gradient-to-t from-white dark:from-[#0b1020] to-transparent"></div>
                            </div>

                            {{-- Toggle --}}
                            <button @click="open = !open" type="button"
                                    class="group inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 transition-colors duration-200">
                                <span
                                    x-text="open ? '{{ __('messages.show_less') }}' : '{{ __('messages.show_more_education') }}'"></span>
                                <span class="inline-block w-4 ml-2 overflow-visible">
                                    <svg class="w-4 h-4 transition-transform duration-200"
                                         :class="open ? 'rotate-180' : 'group-hover:translate-y-0.5'"
                                         fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                         <path stroke-linecap="round" stroke-linejoin="round"
                                               d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                                    </svg>
                                </span>
                            </button>

                        </div>
                    </div>

                    {{-- Languages --}}
                    <div
                        class="p-5 rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08] reveal reveal-delay-4 hover:shadow-lg hover:shadow-indigo-500/10 hover:border-indigo-300 dark:hover:border-indigo-500/40 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div
                                class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802"/>
                                </svg>
                            </div>
                            <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">{{ __('messages.about_lang_label') }}</h3>
                        </div>
                        <div class="space-y-2.5">
                            @foreach([
                                ['Macedonian', __('messages.lang_native'),        100],
                                ['English',    __('messages.lang_advanced'),       85],
                                ['German',     __('messages.lang_upper_int'),      70],
                                ['Russian',    __('messages.lang_intermediate'),   50],
                            ] as [$lang, $level, $pct])
                                <div>
                                    <div class="flex justify-between text-xs mb-1">
                                        <span
                                            class="font-semibold text-slate-700 dark:text-slate-300">{{ $lang }}</span>
                                        <span class="text-slate-400 dark:text-slate-500">{{ $level }}</span>
                                    </div>
                                    <div class="h-1.5 rounded-full bg-slate-100 dark:bg-white/10 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-sky-400"
                                             style="width:{{ $pct }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
