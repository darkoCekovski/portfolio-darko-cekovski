<div x-data="skillModal()" @open-skill-modal.window="openModal($event.detail.slug)">
    {{-- Page header --}}
    <x-page-header
        :eyebrow="__('messages.skills_eyebrow')"
        :title="__('messages.skills_title')"
        :subtitle="__('messages.skills_page_subtitle')"
    />
    {{-- Skills grid --}}
    <x-page-section>
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4">
            @foreach ($skills as $i => $skill)
                @php
                    $value   = max(0, min(10, (int)($skill->proficiency ?? 0)));
                    $percent = (int) round(($value / 10) * 100);
                    $slug    = $skill->slug ?? \Illuminate\Support\Str::slug($skill->name);
                @endphp
                <button type="button"
                        @click="openModal('{{ $slug }}')"
                        class="group flex flex-col items-center gap-3 p-4 rounded-2xl text-left w-full
                               bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08]
                               hover:border-primary-300 dark:hover:border-primary-500/40
                               transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-primary-500/10
                               reveal reveal-delay-{{ min($i % 6 + 1, 5) }}">
                    <div class="relative w-16 h-16"
                         data-skill data-value="{{ $value }}" data-max="10"
                         style="--target: {{ $percent }}; --ring-color: #6366f1; --duration: 1200ms;"
                         role="progressbar" aria-label="{{ $skill->name }}" aria-valuenow="0" aria-valuemin="0"
                         aria-valuemax="100">
                        <div class="absolute inset-0 rounded-full bg-slate-100 dark:bg-white/10"></div>
                        <div class="absolute inset-0 rounded-full skill-ring"></div>
                        <div
                            class="absolute inset-1.5 rounded-full bg-white dark:bg-[#080b14] flex items-center justify-center">
                            @if($skill->logo)
                                <img src="{{ asset($skill->logo) }}" alt="{{ $skill->name }}"
                                     class="w-7 h-7 object-contain opacity-70 group-hover:opacity-100 transition-opacity duration-200"
                                     loading="lazy">
                            @else
                                <span class="text-xs font-bold text-primary-500">{{ substr($skill->name, 0, 2) }}</span>
                            @endif
                        </div>
                        <span
                            class="absolute -bottom-1 left-1/2 -translate-x-1/2 text-[10px] font-bold text-primary-500 dark:text-primary-400 bg-white dark:bg-[#080b14] px-1 rounded">
                            <span class="js-pct">0</span>%
                        </span>
                    </div>
                    <span
                        class="text-xs font-medium text-slate-600 dark:text-slate-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors text-center">
                        {{ $skill->name }}
                    </span>
                </button>
            @endforeach
        </div>
    </x-page-section>

    {{-- ── SKILL DETAIL MODAL ─────────────────────────────────────────── --}}
    <x-detail-modal item-var="skill" close-method="closeModal">
        <x-slot:header>
            <div class="relative bg-gradient-to-br from-primary-500/10 via-secondary-500/5 to-accent-500/10 dark:from-primary-500/20 dark:via-secondary-500/10 dark:to-accent-500/10 p-8 pb-6">
                <div class="flex items-center gap-5">
                    <template x-if="skill.logo">
                        <img :src="skill.logo" :alt="skill.name" class="w-16 h-16 object-contain">
                    </template>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white" x-text="skill.name"></h2>
                        <div class="flex items-center gap-3">
                            <div class="h-2 rounded-full bg-slate-200 dark:bg-white/10 w-48 flex-shrink-0">
                                <div class="h-2 rounded-full bg-gradient-to-r from-primary-500 to-accent-400 transition-all duration-700"
                                     :style="`width: ${(skill.proficiency / 10) * 100}%`"></div>
                            </div>
                            <span class="text-sm font-semibold text-primary-600 dark:text-primary-400 flex-shrink-0"
                                  x-text="`${skill.proficiency}/10`"></span>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot:header>

        <div class="p-8 space-y-5">
            <template x-if="skill.description">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-1">{{ __('messages.skill_description') }}</p>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed" x-text="skill.description"></p>
                </div>
            </template>
            <div class="grid grid-cols-2 gap-4">
                <div class="p-4 rounded-xl bg-slate-50 dark:bg-white/5">
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-1">{{ __('messages.skill_experience') }}</p>
                    <p class="font-semibold text-slate-800 dark:text-slate-200" x-text="skill.experience_duration || '—'"></p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 dark:bg-white/5">
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-1">{{ __('messages.skill_learning_source') }}</p>
                    <p class="font-semibold text-slate-800 dark:text-slate-200 text-sm" x-text="skill.learning_source || '—'"></p>
                </div>
            </div>
        </div>
    </x-detail-modal>

    <script>
        function skillModal() {
            return {
                show: false, loading: false, skill: null, prevUrl: null,
                init() {
                    // Auto-open when arriving via /skill/{slug} directly
                    const autoOpen = '{{ $openSlug ?? "" }}';
                    if (autoOpen) {
                        this.$nextTick(() => this.openModal(autoOpen));
                    }
                },
                openModal(slug) {
                    this.prevUrl = location.href;
                    history.replaceState({}, '', `{{ url(app()->getLocale() . '/skill') }}/${slug}`);
                    this.show = true;
                    this.loading = true;
                    this.skill = null;
                    fetch(`/api/skills/${slug}?locale={{ app()->getLocale() }}`)
                        .then(r => r.json())
                        .then(data => {
                            this.skill = data;
                            this.loading = false;
                        })
                        .catch(() => {
                            this.loading = false;
                        });
                },
                closeModal() {
                    this.show = false;
                    if (this.prevUrl) history.replaceState({}, '', this.prevUrl);
                },
            };
        }
    </script>
</div>
