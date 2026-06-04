<div>
    <section class="py-20 bg-slate-50/50 dark:bg-white/[0.02] border-b border-slate-200 dark:border-white/10">
        <div class="max-w-6xl mx-auto px-6">
            <span
                class="text-xs font-bold uppercase tracking-widest text-indigo-500 dark:text-indigo-400 mb-3 block reveal">{{ __('messages.contact_eyebrow') }}</span>
            <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-white reveal reveal-delay-1">{{ __('messages.contact_title') }}</h1>
            <p class="mt-4 text-slate-500 dark:text-slate-400 max-w-xl reveal reveal-delay-2">{{ __('messages.contact_text') }}</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid lg:grid-cols-5 gap-16">

                {{-- Contact info --}}
                <div class="lg:col-span-2 space-y-8 reveal">
                    @foreach([
                        ['📧', __('messages.contact_email_label'), 'cekovski.darko@gmail.com'],
                        ['📍', __('messages.about_location_label'), __('messages.about_location_value')],
                    ] as [$icon, $label, $value])
                        <div class="flex gap-4">
                            <div
                                class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-lg flex-shrink-0">
                                {{ $icon }}
                            </div>
                            <div>
                                <div
                                    class="text-xs font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">{{ $label }}</div>
                                <div class="font-semibold text-slate-700 dark:text-slate-300 mt-0.5">{{ $value }}</div>
                            </div>
                        </div>
                    @endforeach

                    <div
                        class="p-6 rounded-2xl bg-gradient-to-br from-indigo-500/10 to-sky-500/10 dark:from-indigo-500/20 dark:to-sky-500/15 border border-indigo-200/50 dark:border-indigo-500/20">
                        <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">{{ __('messages.contact_response_note') }}</p>
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
                        {{-- After --}}
                        <button type="submit"
                                wire:loading.attr="disabled"
                                wire:target="submit"
                                class="w-full flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-semibold text-sm
               bg-indigo-600 hover:bg-indigo-700 text-white shadow-md shadow-indigo-500/20
               disabled:opacity-60 disabled:cursor-not-allowed transition-all duration-200">
                            <svg wire:loading wire:target="submit"
                                 class="w-4 h-4 animate-spin flex-shrink-0"
                                 fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            <span wire:loading.remove wire:target="submit">{{ __('messages.contact_submit') }}</span>
                            <span wire:loading wire:target="submit">{{ __('messages.contact_sending') }}</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
