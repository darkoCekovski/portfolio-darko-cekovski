<div>
    <x-page-header
        :eyebrow="__('messages.contact_eyebrow')"
        :title="__('messages.contact_title')"
        :subtitle="__('messages.contact_text')"
    />

    <x-page-section>
        <div class="grid lg:grid-cols-5 gap-16">

            <!-- Contact info -->
            <div class="lg:col-span-2 space-y-8 reveal">

                <!-- Location -->
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-primary-50 dark:bg-primary-500/10
                                flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                            {{ __('messages.about_location_label') }}
                        </div>
                        <div class="font-semibold text-slate-700 dark:text-slate-300 mt-0.5">
                            {{ __('messages.about_location_detail') }}
                        </div>
                    </div>
                </div>

                <!-- Response note -->
                <div class="p-6 rounded-2xl bg-gradient-to-br from-primary-500/10 to-accent-500/10
                            dark:from-primary-500/20 dark:to-accent-500/15
                            border border-primary-200/50 dark:border-primary-500/20">
                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                        {{ __('messages.contact_response_note') }}
                    </p>
                </div>

            </div>

            <!-- Form -->
            <div class="lg:col-span-3 reveal reveal-delay-2">

                <form wire:submit="submit" class="space-y-5" novalidate>

                    <!-- Required fields note -->
                    <x-form.required-note/>

                    <!-- Name -->
                    <x-form.field field="name" wire:model.blur="name" autocomplete="name" :required="true"
                                  :label="__('messages.contact_name_label')"
                                  :placeholder="__('messages.contact_name_placeholder')"/>

                    <!-- Email -->
                    <x-form.field field="email" type="email" wire:model.blur="email" autocomplete="email" :required="true"
                                  :label="__('messages.contact_email_label')"
                                  :placeholder="__('messages.contact_email_placeholder')"/>

                    <!-- Message -->
                    <x-form.field field="comment" type="textarea" :rows="6" wire:model.blur="comment" :required="true"
                                  :label="__('messages.contact_message_label')"
                                  :placeholder="__('messages.contact_message_placeholder')"/>

                    <!-- Cloudflare Turnstile -->
                    <div>
                        <div wire:ignore
                             x-data="turnstileWidget()"
                             x-init="init()">
                            <div x-ref="widget"></div>
                        </div>
                        <x-form.error field="turnstileToken"/>
                    </div>

                    <!-- Privacy notice -->
                    <x-form.privacy-note/>

                    <!-- Submit -->
                    <x-primary-button type="submit"
                                      wire:loading.attr="disabled"
                                      wire:target="submit"
                                      class="w-full justify-center">
                        <svg wire:loading wire:target="submit"
                             class="h-4 w-4 flex-shrink-0 animate-spin"
                             fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span wire:loading.remove wire:target="submit">{{ __('messages.contact_submit') }}</span>
                        <span wire:loading wire:target="submit">{{ __('messages.contact_sending') }}</span>
                    </x-primary-button>

                </form>
            </div>
        </div>
    </x-page-section>

    @script
    <script>
        Alpine.data('turnstileWidget', () => ({
            widgetId: null,
            rendered: false,

            init() {
                if (window.turnstile) {
                    this.renderWidget();
                } else {
                    document.addEventListener('turnstile-ready', () => {
                        this.renderWidget();
                    }, { once: true });
                }
            },

            renderWidget() {
                if (this.rendered) return;
                this.rendered = true;
                this.widgetId = window.turnstile.render(this.$refs.widget, {
                    sitekey: '{{ config('services.turnstile.site_key') }}',
                    theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
                    language: '{{ app()->getLocale() }}',
                    callback: (token) => { $wire.set('turnstileToken', token); },
                    'expired-callback': () => { $wire.set('turnstileToken', ''); },
                    'error-callback': () => { $wire.set('turnstileToken', ''); },
                });
            },
        }));

        Livewire.on('reset-turnstile', () => {
            if (window.turnstile) {
                window.turnstile.reset();
            }
        });
    </script>
    @endscript

</div>
