<div>
    <x-page-header
        :eyebrow="__('messages.blog_eyebrow')"
        :title="__('messages.blog_title')"
        :subtitle="__('messages.blog_subtitle')"
    />

    <x-page-section>
        <div class="grid lg:grid-cols-3 gap-10">

            <!-- Category filters -->
            <div class="flex flex-wrap gap-2 lg:flex-col lg:flex-nowrap lg:items-start lg:self-start lg:sticky lg:top-24">

                <!-- "Latest" clears every filter and resets the URL to /blog -->
                <button wire:click="showLatest"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200
                   {{ !$category
                      ? 'bg-primary-600 text-white shadow-sm shadow-primary-500/20'
                      : 'bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-white/10 border border-slate-200 dark:border-white/10' }}">
                    {{ __('messages.blog_filter_latest') }}
                </button>

                <!-- One filter per category, sorted by sort_order -->
                @foreach($categories as $cat)
                    <button wire:click="filterByCategory(@js($cat->slug))"
                            class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200
                       {{ $category === $cat->slug
                          ? 'bg-primary-600 text-white shadow-sm shadow-primary-500/20'
                          : 'bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-white/10 border border-slate-200 dark:border-white/10' }}">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>

            <!-- Post grid: 1 column on mobile, 2 columns from sm up -->
            <div class="lg:col-span-2">
                <div class="grid sm:grid-cols-2 gap-6">
                    @forelse($posts as $post)
                        <x-blog-card :post="$post"/>
                    @empty
                        <!-- Empty state -->
                        <div class="col-span-full text-center py-20">
                            <svg class="w-12 h-12 text-slate-300 dark:text-slate-600 mx-auto mb-4"
                                 fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"/>
                            </svg>
                            <p class="text-slate-500 dark:text-slate-400 font-medium">{{ __('messages.blog_empty') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </x-page-section>
</div>
