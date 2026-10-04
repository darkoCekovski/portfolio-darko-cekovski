<div>
    <x-page-header
        :eyebrow="__('messages.hire_eyebrow')"
        :title="__('messages.hire_title')"
        :subtitle="__('messages.hire_subtitle')"
    />

    <x-page-section>
        <div class="mx-auto max-w-3xl reveal">

            <!-- Wizard card: Alpine owns all the state, so Livewire must never morph this subtree (wire:ignore) -->
            <div wire:ignore
                 x-data="hireWizard(@js($config))"
                 class="scroll-mt-24 rounded-3xl border border-slate-200 bg-white p-6 shadow-xl shadow-primary-500/5
                        dark:border-white/[0.08] dark:bg-white/[0.03] sm:p-10">

                <form x-show="!done" @submit.prevent="next()" novalidate>

                    <!-- PROGRESS -->
                    <div class="mb-6">
                        <div class="mb-3 flex items-center justify-between text-xs font-semibold">
                            <span class="text-primary-600 dark:text-primary-400" aria-live="polite" x-text="stepLabel"></span>
                            <span class="text-slate-400 dark:text-slate-500" x-text="stepTitles[step - 1]"></span>
                        </div>

                        <div class="h-1.5 overflow-hidden rounded-full bg-slate-100 dark:bg-white/10"
                             role="progressbar" aria-valuemin="1" :aria-valuemax="totalSteps" :aria-valuenow="step">
                            <div class="h-full rounded-full bg-gradient-to-r from-primary-500 via-secondary-500 to-accent-500 transition-all duration-500 ease-out"
                                 :style="'width:' + progress + '%'"></div>
                        </div>

                        <!-- Step names: desktop only; on narrow screens "Step X of Y" is enough. Finished steps can be revisited. -->
                        <ol class="mt-3 hidden grid-cols-4 gap-2 text-xs font-medium sm:grid">
                            <template x-for="(title, i) in stepTitles" :key="i">
                                <li>
                                    <button type="button" @click="goTo(i + 1)" :disabled="i + 1 >= step"
                                            :aria-current="i + 1 === step ? 'step' : null"
                                            :class="i + 1 === step
                                                ? 'text-primary-600 dark:text-primary-400'
                                                : (i + 1 < step
                                                    ? 'text-slate-600 hover:text-primary-600 dark:text-slate-300 dark:hover:text-primary-400'
                                                    : 'text-slate-400 dark:text-slate-500')"
                                            class="transition-colors duration-200 disabled:cursor-default">
                                        <span x-text="(i + 1) + '. ' + title"></span>
                                    </button>
                                </li>
                            </template>
                        </ol>
                    </div>

                    <!-- Required-fields note; kept invisible (not removed) on step 1 so nothing shifts when it appears -->
                    <p class="mb-6 text-xs text-slate-400 dark:text-slate-500" :class="step > 1 ? '' : 'invisible'">
                        <span class="text-red-400">*</span> {{ __('messages.contact_required_note') }}
                    </p>

                    <!-- STEPS: stacked in one grid cell, so the old and the new step overlap while they cross-fade -->
                    <div class="-mx-4 grid overflow-x-clip px-4" :style="'--hire-dir:' + direction">

                        <!-- STEP 1: goal -->
                        <x-wizard-step :n="1">
                            <fieldset data-field="intent">
                                <legend class="sr-only">{{ __('messages.hire_s1_title') }}</legend>
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <x-choice-card name="intent" value="project" model="form.intent"
                                                   :label="__('messages.hire_intent_project')"
                                                   :hint="__('messages.hire_intent_project_hint')">
                                        <x-slot name="icon">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/>
                                            </svg>
                                        </x-slot>
                                    </x-choice-card>

                                    <x-choice-card name="intent" value="role" model="form.intent"
                                                   :label="__('messages.hire_intent_role')"
                                                   :hint="__('messages.hire_intent_role_hint')">
                                        <x-slot name="icon">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                            </svg>
                                        </x-slot>
                                    </x-choice-card>
                                </div>
                                <x-field-error field="intent"/>
                            </fieldset>

                            <p class="mt-6 text-sm text-slate-500 dark:text-slate-400">
                                {{ __('messages.hire_contact_prompt') }}
                                <a href="{{ localized_route('contact') }}" class="font-semibold text-primary-600 hover:underline dark:text-primary-400">
                                    {{ __('messages.hire_contact_link') }}
                                </a>
                            </p>
                        </x-wizard-step>

                        <!-- STEP 2: details (project path or role path) -->
                        <x-wizard-step :n="2">
                            <div x-show="!isRole" class="space-y-6">
                                <fieldset data-field="projectTypes">
                                    <legend class="mb-3 text-sm font-semibold text-slate-700 dark:text-slate-300">
                                        {{ __('messages.hire_types_legend') }} <span class="text-red-400" aria-hidden="true">*</span>
                                    </legend>
                                    <div class="grid gap-3 sm:grid-cols-2">
                                        @foreach($options['types'] as $value => $label)
                                            <x-choice-card type="checkbox" name="projectTypes" :value="$value"
                                                           model="form.projectTypes" :label="$label"/>
                                        @endforeach
                                    </div>
                                    <x-field-error field="projectTypes"/>
                                </fieldset>

                                <x-wizard-field field="description" type="textarea" :required="true" :maxlength="2000"
                                                :label="__('messages.hire_desc_label')"
                                                :placeholder="__('messages.hire_desc_placeholder')"/>

                                <x-wizard-field field="link" type="url" autocomplete="url" placeholder="https://"
                                                :label="__('messages.hire_link_label')"/>
                            </div>

                            <div x-show="isRole" x-cloak class="space-y-6">
                                <x-wizard-field field="company" :required="true" :maxlength="120" autocomplete="organization"
                                                :label="__('messages.hire_company_label')"/>
                                <x-wizard-field field="roleTitle" :label="__('messages.hire_role_label')"/>
                            </div>
                        </x-wizard-step>

                        <!-- STEP 3: conditions (budget for a project, work model for a role, start for both) -->
                        <x-wizard-step :n="3">
                            <div class="space-y-8">
                                <fieldset x-show="!isRole" data-field="budget">
                                    <legend class="mb-3 text-sm font-semibold text-slate-700 dark:text-slate-300">
                                        {{ __('messages.hire_budget_label') }} <span class="text-red-400" aria-hidden="true">*</span>
                                    </legend>
                                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                                        @foreach($options['budgets'] as $value => $label)
                                            <x-choice-card name="budget" :value="$value" model="form.budget" :label="$label"/>
                                        @endforeach
                                    </div>
                                    <p class="mt-3 text-xs text-slate-400 dark:text-slate-500">{{ __('messages.hire_budget_note') }}</p>
                                    <x-field-error field="budget"/>
                                </fieldset>

                                <fieldset x-show="isRole" x-cloak data-field="workModel">
                                    <legend class="mb-3 text-sm font-semibold text-slate-700 dark:text-slate-300">
                                        {{ __('messages.hire_work_label') }} <span class="text-red-400" aria-hidden="true">*</span>
                                    </legend>
                                    <div class="grid gap-3 sm:grid-cols-3">
                                        @foreach($options['workModels'] as $value => $label)
                                            <x-choice-card name="workModel" :value="$value" model="form.workModel" :label="$label"/>
                                        @endforeach
                                    </div>
                                    <x-field-error field="workModel"/>
                                </fieldset>

                                <fieldset data-field="timeline">
                                    <legend class="mb-3 text-sm font-semibold text-slate-700 dark:text-slate-300">
                                        {{ __('messages.hire_timeline_label') }} <span class="text-red-400" aria-hidden="true">*</span>
                                    </legend>
                                    <div class="grid gap-3 sm:grid-cols-3">
                                        @foreach($options['timelines'] as $value => $label)
                                            <x-choice-card name="timeline" :value="$value" model="form.timeline" :label="$label"/>
                                        @endforeach
                                    </div>
                                    <x-field-error field="timeline"/>
                                </fieldset>
                            </div>
                        </x-wizard-step>

                        <!-- STEP 4: contact -->
                        <x-wizard-step :n="4">
                            <!-- Recap of the answers, so the visitor can review them before sending -->
                            <div class="mb-6 rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-white/[0.08] dark:bg-white/[0.03]">
                                <p class="mb-2 text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">
                                    {{ __('messages.hire_recap') }}
                                </p>
                                <div class="flex flex-wrap gap-1.5">
                                    <template x-for="(chip, i) in recap" :key="i">
                                        <x-tech-badge x-text="chip"/>
                                    </template>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="grid gap-6 sm:grid-cols-2">
                                    <x-wizard-field field="name" :required="true" :maxlength="100" autocomplete="name"
                                                    :label="__('messages.hire_name_label')"/>
                                    <x-wizard-field field="email" type="email" :required="true" :maxlength="150" autocomplete="email"
                                                    :label="__('messages.hire_email_label')"/>
                                </div>

                                <fieldset data-field="language">
                                    <legend class="mb-3 text-sm font-semibold text-slate-700 dark:text-slate-300">
                                        {{ __('messages.hire_lang_label') }}
                                    </legend>
                                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                                        @foreach($languages as $value => $label)
                                            <x-choice-card name="language" :value="$value" model="form.language" :label="$label"/>
                                        @endforeach
                                    </div>
                                </fieldset>

                                <!-- Honeypot: moved off-screen and hidden from assistive tech; bots fill it, people never see it -->
                                <div class="absolute -left-[9999px] h-0 w-0 overflow-hidden" aria-hidden="true">
                                    <label>Website <input type="text" name="hp_url" tabindex="-1" autocomplete="off" x-model="form.website"></label>
                                </div>

                                <p class="text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                    {{ __('messages.hire_privacy_note') }}
                                    <a href="{{ localized_route('privacy') }}" target="_blank" rel="noopener"
                                       class="font-semibold text-primary-600 hover:underline dark:text-primary-400">{{ __('messages.hire_privacy_link') }}</a>.
                                </p>

                                <p x-show="serverError" x-text="serverError" x-cloak role="alert"
                                   class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600 dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-400"></p>
                            </div>
                        </x-wizard-step>
                    </div>

                    <!-- NAVIGATION: Back on the left (secondary), Continue / Send on the right (primary) -->
                    <div class="mt-10 flex items-center justify-between gap-4 border-t border-slate-200 pt-6 dark:border-white/10">
                        <button type="button" @click="back()" x-show="step > 1" x-cloak
                                class="inline-flex h-12 items-center gap-2 rounded-xl border border-slate-200 px-5 text-sm font-semibold
                                       text-slate-600 transition-all duration-200 hover:bg-slate-100
                                       dark:border-white/10 dark:text-slate-300 dark:hover:bg-white/5">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                            </svg>
                            {{ __('messages.hire_back') }}
                        </button>

                        <button type="submit" :disabled="submitting"
                                class="ml-auto inline-flex h-12 items-center justify-center gap-2 rounded-xl bg-primary-600 px-6 text-sm
                                       font-semibold text-white shadow-lg shadow-primary-500/25 transition-all duration-200
                                       hover:-translate-y-0.5 hover:bg-primary-700
                                       disabled:cursor-not-allowed disabled:opacity-60 disabled:hover:translate-y-0">
                            <svg x-show="submitting" x-cloak class="h-4 w-4 flex-shrink-0 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            <span x-text="submitting ? ui.sending : (step === totalSteps ? ui.send : ui.next)"></span>
                            <svg x-show="!submitting && step < totalSteps" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- SUCCESS -->
                <div x-show="done" x-cloak class="py-6 text-center">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-primary-500 via-secondary-500 to-accent-500 text-white shadow-lg shadow-primary-500/25">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                    </div>
                    <h2 id="hire-done-heading" tabindex="-1" class="mb-3 text-2xl font-bold text-slate-900 outline-none dark:text-white" x-text="doneTitle"></h2>
                    <p class="mx-auto mb-8 max-w-md text-slate-500 dark:text-slate-400">
                        {{ __('messages.hire_done_text') }} {{ __('messages.contact_response_note') }}
                    </p>
                    <div class="flex flex-wrap justify-center gap-3">
                        <x-primary-button href="{{ localized_route('projects') }}">{{ __('messages.hire_done_projects') }}</x-primary-button>
                        <x-ghost-button href="{{ localized_route('blogs') }}">{{ __('messages.hire_done_blog') }}</x-ghost-button>
                    </div>
                </div>
            </div>
        </div>
    </x-page-section>

    @script
    <script>
        @verbatim
        Alpine.data('hireWizard', (config) => {
            // Step that holds each field; used to jump to the right step when the server rejects a value
            const FIELD_STEP = {
                intent: 1,
                projectTypes: 2, description: 2, link: 2, company: 2, roleTitle: 2,
                workModel: 3, budget: 3, timeline: 3,
                name: 4, email: 4, language: 4,
            };

            return {
                // ── Static data from the server ──
                totalSteps: 4,
                stepTitles: config.steps,
                ui: config.ui,

                // ── State (everything the visitor typed lives here, so Back never loses anything) ──
                step: 1,
                direction: 1,          // 1 = moving forward, -1 = moving back; drives the slide direction in app.css
                done: false,
                submitting: false,
                serverError: '',
                errors: {},
                guard: null,
                form: {
                    intent: '',
                    projectTypes: [], description: '', link: '',        // project path
                    company: '', roleTitle: '', workModel: '',          // role path
                    budget: '', timeline: '',
                    name: '', email: '', language: config.locale,
                    website: '',                                        // honeypot
                },

                // ── Lifecycle ──
                init() {
                    // Warn before leaving once the visitor has made progress (the text of the prompt is the browser's own)
                    this.guard = (event) => {
                        if (this.step > 1 && !this.done) {
                            event.preventDefault();
                            event.returnValue = '';
                        }
                    };
                    window.addEventListener('beforeunload', this.guard);
                },

                destroy() {
                    window.removeEventListener('beforeunload', this.guard);
                },

                // ── Derived values ──
                get isRole() { return this.form.intent === 'role'; },
                get progress() { return (this.step / this.totalSteps) * 100; },
                get stepLabel() { return this.ui.stepOf.replace(':current', this.step).replace(':total', this.totalSteps); },
                get doneTitle() { return this.ui.doneTitle.replace(':name', this.form.name.trim().split(' ')[0]); },

                // Heading and intro text of a step; steps 2 and 3 differ between the project and the role path
                heading(n) {
                    const key = (n === 2 || n === 3) ? n + (this.isRole ? 'role' : 'project') : String(n);
                    return config.headings[key];
                },

                // Short summary chips shown above the contact fields
                get recap() {
                    const f = this.form;
                    const l = config.labels;
                    const chips = [l.intent[f.intent]];

                    if (this.isRole) {
                        chips.push(f.company.trim(), l.workModel[f.workModel]);
                    } else {
                        f.projectTypes.forEach((type) => chips.push(l.projectTypes[type]));
                        chips.push(l.budget[f.budget]);
                    }

                    chips.push(l.timeline[f.timeline]);
                    return chips.filter(Boolean);
                },

                // ── Validation: returns { field: message } for one step; an empty object means the step is valid ──
                validateStep(step) {
                    const f = this.form;
                    const m = config.messages;
                    const e = {};

                    if (step === 1 && !f.intent) {
                        e.intent = m.choose;
                    }

                    if (step === 2) {
                        if (this.isRole) {
                            if (!f.company.trim()) e.company = m.required;
                        } else {
                            if (!f.projectTypes.length) e.projectTypes = m.chooseOne;
                            if (f.description.trim().length < 20) e.description = m.minLength;
                            if (f.link.trim() && !this.isUrl(f.link)) e.link = m.url;
                        }
                    }

                    if (step === 3) {
                        if (this.isRole) {
                            if (!f.workModel) e.workModel = m.choose;
                        } else if (!f.budget) {
                            e.budget = m.choose;
                        }
                        if (!f.timeline) e.timeline = m.choose;
                    }

                    if (step === 4) {
                        if (f.name.trim().length < 2) e.name = m.required;
                        if (!f.email.trim()) e.email = m.required;
                        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(f.email.trim())) e.email = m.email;
                    }

                    return e;
                },

                // Accepts "example.com/page" as well as full http(s) links
                normalizeUrl(value) {
                    const v = value.trim();
                    if (!v) return '';
                    return /^https?:\/\//i.test(v) ? v : 'https://' + v;
                },

                isUrl(value) {
                    try {
                        return new URL(this.normalizeUrl(value)).hostname.includes('.');
                    } catch (error) {
                        return false;
                    }
                },

                // ── Navigation ──
                next() {
                    if (this.submitting) return;

                    const errors = this.validateStep(this.step);
                    this.errors = errors;

                    if (Object.keys(errors).length) {
                        this.focusFirstError(errors);
                        return;
                    }

                    if (this.step < this.totalSteps) this.go(this.step + 1, 1);
                    else this.submit();
                },

                back() {
                    if (this.step > 1) this.go(this.step - 1, -1);
                },

                // Finished steps in the step list can be revisited; nothing the visitor entered is cleared
                goTo(n) {
                    if (n < this.step) this.go(n, -1);
                },

                go(n, dir) {
                    this.direction = dir;
                    this.errors = {};
                    this.step = n;

                    this.$nextTick(() => {
                        // Focus lands on the new step's heading instead of a button that has just disappeared
                        document.getElementById('hire-step-' + n + '-heading')?.focus({ preventScroll: true });

                        // Bring the card back into view when Continue was pressed far down on a small screen
                        if (this.$root.getBoundingClientRect().top < 0) {
                            const calm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                            this.$root.scrollIntoView({ behavior: calm ? 'auto' : 'smooth', block: 'start' });
                        }
                    });
                },

                focusFirstError(errors) {
                    const key = Object.keys(errors)[0];

                    this.$nextTick(() => {
                        const holder = this.$root.querySelector('[data-field="' + key + '"]');
                        const target = holder && (holder.matches('input, textarea') ? holder : holder.querySelector('input'));
                        target?.focus();
                    });
                },

                // ── Submit ──
                // Only the fields of the chosen path are sent; answers typed on the other path are ignored
                payload() {
                    const f = this.form;
                    const common = {
                        locale: config.locale,
                        intent: f.intent,
                        timeline: f.timeline,
                        name: f.name.trim(),
                        email: f.email.trim(),
                        language: f.language,
                        website: f.website,
                    };

                    return this.isRole
                        ? { ...common, company: f.company.trim(), roleTitle: f.roleTitle.trim() || null, workModel: f.workModel }
                        : { ...common, projectTypes: [...f.projectTypes], description: f.description.trim(), link: this.normalizeUrl(f.link) || null, budget: f.budget };
                },

                async submit() {
                    if (this.submitting) return;

                    this.submitting = true;
                    this.serverError = '';

                    try {
                        const result = await $wire.submit(this.payload());

                        if (result && result.ok) {
                            this.done = true;
                            this.$nextTick(() => {
                                document.getElementById('hire-done-heading')?.focus({ preventScroll: true });
                                this.$root.scrollIntoView({ behavior: 'smooth', block: 'start' });
                            });
                        } else if (result && result.errors) {
                            this.applyServerErrors(result.errors);
                        } else {
                            this.serverError = result && result.message === 'throttled'
                                ? config.messages.throttled
                                : config.messages.server;
                        }
                    } catch (error) {
                        // Network failure, expired session (419) or a server error
                        this.serverError = config.messages.server;
                    } finally {
                        this.submitting = false;
                    }
                },

                // The server is the authority: if it rejects something, show it and jump to the step it belongs to
                applyServerErrors(serverErrors) {
                    const errors = {};

                    Object.entries(serverErrors).forEach(([key, messages]) => {
                        const field = key.split('.')[0];            // "projectTypes.0" -> "projectTypes"
                        if (!errors[field]) errors[field] = messages[0];
                    });

                    const target = Math.min(...Object.keys(errors).map((field) => FIELD_STEP[field] || 4));

                    this.go(target, target < this.step ? -1 : 1);
                    this.errors = errors;                           // go() clears the errors, so they are set afterwards
                    this.focusFirstError(errors);
                },
            };
        });
        @endverbatim
    </script>
    @endscript
</div>
