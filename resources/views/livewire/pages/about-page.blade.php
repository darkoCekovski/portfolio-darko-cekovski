<div>

    {{-- Page header --}}
    <x-page-header
        :eyebrow="__('messages.about_eyebrow')"
        :title="__('messages.about_title')"
        :subtitle="__('messages.about_page_subtitle')"
    />
    {{-- Page content --}}
    <x-page-section>
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
                <x-about-card
                    :title="__('messages.about_experience')"
                    padding="p-6"
                    x-data="{ open: false }"
                    class="reveal reveal-delay-2"
                >
                    <x-slot name="icon">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                        </svg>
                    </x-slot>

                    <div
                        class="space-y-7 relative before:absolute before:left-[7px] before:top-2 before:bottom-2 before:w-px before:bg-slate-200 dark:before:bg-white/10">

                        {{-- Current roles (always visible) --}}
                        @foreach([
                            ['02/2022 – '.__('messages.exp_present'), 'Fireswitch Media B.V.', __('messages.exp_fireswitch_role'), 'exp_fireswitch_bullets'],
                            ['03/2020 – '.__('messages.exp_present'), __('messages.exp_freelance'), __('messages.exp_fireswitch_role'), 'exp_freelance_bullets'],
                        ] as [$years, $company, $role, $bulletsKey])
                            <x-timeline-item
                                :years="$years"
                                :company="$company"
                                :role="$role"
                                :bullets="__('messages.'.$bulletsKey)"
                                :active="true"
                            />
                        @endforeach

                        {{-- Earlier career (collapsible) --}}
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
                                    <x-timeline-item
                                        :company="$title"
                                        :role="$company"
                                        :bullets="__('messages.'.$bulletsKey)"
                                    />
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
                </x-about-card>

                {{-- CTAs --}}
                <div class="flex gap-4 pt-2 reveal reveal-delay-4">
                    <x-primary-button href="{{ localized_route('contact') }}" size="sm">
                        {{ __('messages.contact_cta') }}
                    </x-primary-button>
                    @livewire('download-cv')
                </div>

            </div>

            {{-- ── RIGHT: sidebar ──────────────────────────────────── --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Profile photo --}}
                <div class="reveal flex items-center justify-center">
                    @if(file_exists(public_path('images/profile.png')))
                        <div class="relative inline-block">
                            <div class="absolute inset-0 -z-10 overflow-visible">
                                <div
                                    class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-indigo-500/15 dark:bg-indigo-500/10 blur-3xl"></div>
                                <div
                                    class="absolute -bottom-16 -left-16 w-56 h-56 rounded-full bg-sky-500/15 dark:bg-sky-500/10 blur-3xl"></div>
                            </div>
                            <img src="{{ asset('images/profile.png') }}" alt="Darko Cekovski"
                                 class="relative z-10 w-full max-w-[200px]">
                        </div>
                    @else
                        <div class="flex flex-col items-center gap-3 text-slate-300 dark:text-slate-600 py-8">
                            <svg class="w-20 h-20" fill="none" stroke="currentColor" stroke-width="1"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0zM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                            <span class="text-xs font-medium">{{ __('messages.about_photo_placeholder') }}</span>
                        </div>
                    @endif
                </div>

                {{-- Location --}}
                <x-about-card :title="__('messages.about_location_label')" class="reveal reveal-delay-1">
                    <x-slot name="icon">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z"/>
                        </svg>
                    </x-slot>
                    <p class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-1">{{ __('messages.about_location_detail') }}</p>
                    <p class="text-xs text-slate-400 dark:text-slate-500 leading-relaxed">{{ __('messages.about_location_region') }}</p>
                </x-about-card>

                {{-- Focus --}}
                <x-about-card :title="__('messages.about_focus_label')" class="reveal reveal-delay-2">
                    <x-slot name="icon">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/>
                        </svg>
                    </x-slot>
                    <div class="space-y-3">
                        <x-progress-bar
                            :label="__('messages.about_frontend')"
                            :value="'6 '.__('messages.about_years')"
                            :percent="90"
                            :colored="true"
                        />
                        <x-progress-bar
                            :label="__('messages.about_backend')"
                            :value="'2 '.__('messages.about_years')"
                            :percent="33"
                            :colored="true"
                        />
                    </div>
                </x-about-card>

                {{-- Education --}}
                <x-about-card
                    :title="__('messages.about_edu_label')"
                    padding="p-6"
                    x-data="{ open: false }"
                    class="reveal reveal-delay-3"
                >
                    <x-slot name="icon">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/>
                        </svg>
                    </x-slot>

                    <div
                        class="space-y-6 relative before:absolute before:left-[7px] before:top-2 before:bottom-2 before:w-px before:bg-slate-200 dark:before:bg-white/10">

                        {{-- Frontend Academy (always visible) --}}
                        <x-timeline-item
                            :company="__('messages.edu_academy_title')"
                            :role="__('messages.edu_academy_co')"
                            :bullets="__('messages.edu_academy_bullets')"
                            :active="true"
                        />

                        {{-- Collapsible: degree + high school --}}
                        <div class="relative">
                            <div class="overflow-hidden transition-all duration-500 space-y-6"
                                 :style="open ? 'max-height: 800px' : 'max-height: 40px'">
                                <x-timeline-item
                                    :company="__('messages.edu_bachelor_title')"
                                    :role="__('messages.edu_bachelor_co')"
                                    :bullets="__('messages.edu_bachelor_bullets')"
                                />
                                <x-timeline-item
                                    :company="__('messages.edu_highschool_title')"
                                    :role="__('messages.edu_highschool_co')"
                                    :bullets="__('messages.edu_highschool_bullets')"
                                />
                            </div>
                            <div x-show="!open"
                                 class="absolute inset-x-0 bottom-0 h-16 pointer-events-none bg-gradient-to-t from-white dark:from-[#0b1020] to-transparent"></div>
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
                </x-about-card>

                {{-- Languages --}}
                <x-about-card :title="__('messages.about_lang_label')" class="reveal reveal-delay-4">
                    <x-slot name="icon">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802"/>
                        </svg>
                    </x-slot>
                    <div class="space-y-2.5">
                        @foreach([
                            ['Macedonian', __('messages.lang_native'),      100],
                            ['English',    __('messages.lang_advanced'),     85],
                            ['German',     __('messages.lang_upper_int'),    70],
                            ['Russian',    __('messages.lang_intermediate'), 50],
                        ] as [$lang, $level, $pct])
                            <x-progress-bar :label="$lang" :value="$level" :percent="$pct"/>
                        @endforeach
                    </div>
                </x-about-card>

            </div>
        </div>
    </x-page-section>

</div>
