<div>
    <x-page-header
        :eyebrow="__('messages.contact_eyebrow')"
        :title="__('messages.contact_title')"
        :subtitle="__('messages.contact_text')"
    />

    <x-page-section>
        <div class="grid lg:grid-cols-5 gap-16">

            {{-- Contact info --}}
            <div class="lg:col-span-2 space-y-8 reveal">

                {{-- Email --}}
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-500/10
                                flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                            {{ __('messages.contact_email_label') }}
                        </div>
                        <a href="mailto:hello@darkocekovski.com"
                           class="font-semibold text-slate-700 dark:text-slate-300 mt-0.5 block
                                  hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                            hello@darkocekovski.com
                        </a>
                    </div>
                </div>

                {{-- Location --}}
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-500/10
                                flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor"
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

                {{-- Response note --}}
                <div class="p-6 rounded-2xl bg-gradient-to-br from-indigo-500/10 to-sky-500/10
                            dark:from-indigo-500/20 dark:to-sky-500/15
                            border border-indigo-200/50 dark:border-indigo-500/20">
                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                        {{ __('messages.contact_response_note') }}
                    </p>
                </div>

            </div>

            {{-- Form --}}
            <div class="lg:col-span-3 reveal reveal-delay-2">

                <form wire:submit="submit" class="space-y-5" novalidate>

                    {{-- Name --}}
                    <div>
                        <label for="name"
                               class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            {{ __('messages.contact_name_label') }} <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               id="name"
                               wire:model.blur="name"
                               autocomplete="name"
                               placeholder="{{ __('messages.contact_name_placeholder') }}"
                            @class([
                                'w-full px-4 py-3 rounded-xl text-sm border transition-all duration-200',
                                'bg-white dark:bg-white/[0.03] text-slate-800 dark:text-slate-200',
                                'placeholder-slate-400 dark:placeholder-slate-500',
                                'focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400',
                                'border-red-400 dark:border-red-500 bg-red-50/30 dark:bg-red-500/5' => $errors->has('name'),
                                'border-slate-200 dark:border-white/10' => !$errors->has('name'),
                            ])>
                        @error('name')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <svg class="w-3 h-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                      clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email"
                               class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            {{ __('messages.contact_email_label') }} <span class="text-red-400">*</span>
                        </label>
                        <input type="email"
                               id="email"
                               wire:model.blur="email"
                               autocomplete="email"
                               placeholder="{{ __('messages.contact_email_placeholder') }}"
                            @class([
                                'w-full px-4 py-3 rounded-xl text-sm border transition-all duration-200',
                                'bg-white dark:bg-white/[0.03] text-slate-800 dark:text-slate-200',
                                'placeholder-slate-400 dark:placeholder-slate-500',
                                'focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400',
                                'border-red-400 dark:border-red-500 bg-red-50/30 dark:bg-red-500/5' => $errors->has('email'),
                                'border-slate-200 dark:border-white/10' => !$errors->has('email'),
                            ])>
                        @error('email')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <svg class="w-3 h-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                      clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Message --}}
                    <div>
                        <label for="comment"
                               class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            {{ __('messages.contact_message_label') }} <span class="text-red-400">*</span>
                        </label>
                        <textarea id="comment"
                                  wire:model.blur="comment"
                                  rows="6"
                                  placeholder="{{ __('messages.contact_message_placeholder') }}"
                                  @class([
                                      'w-full px-4 py-3 rounded-xl text-sm border transition-all duration-200 resize-none',
                                      'bg-white dark:bg-white/[0.03] text-slate-800 dark:text-slate-200',
                                      'placeholder-slate-400 dark:placeholder-slate-500',
                                      'focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400',
                                      'border-red-400 dark:border-red-500 bg-red-50/30 dark:bg-red-500/5' => $errors->has('comment'),
                                      'border-slate-200 dark:border-white/10' => !$errors->has('comment'),
                                  ])></textarea>
                        @error('comment')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <svg class="w-3 h-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                      clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            wire:loading.attr="disabled"
                            wire:target="submit"
                            class="w-full inline-flex items-center justify-center gap-2 h-12 px-6 rounded-xl
                                   font-semibold text-sm bg-indigo-600 hover:bg-indigo-700 text-white
                                   shadow-lg shadow-indigo-500/25 transition-all duration-200 hover:-translate-y-0.5
                                   disabled:opacity-60 disabled:cursor-not-allowed disabled:hover:translate-y-0">
                        <svg wire:loading wire:target="submit"
                             class="w-4 h-4 animate-spin flex-shrink-0"
                             fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span wire:loading.remove wire:target="submit">{{ __('messages.contact_submit') }}</span>
                        <span wire:loading wire:target="submit">{{ __('messages.contact_sending') }}</span>
                    </button>

                </form>
            </div>
        </div>
    </x-page-section>
</div>
