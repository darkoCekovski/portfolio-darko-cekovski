<div>
    <x-page-section>
        <div class="max-w-4xl mx-auto">

            <!-- Back -->
            <a href="{{ localized_route('blogs') }}"
               class="group inline-flex items-center text-sm font-semibold text-primary-600 dark:text-primary-400
                      mb-10 transition-colors duration-200 reveal">
                <span class="inline-block w-4 mr-2 overflow-visible">
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1.5"
                         fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                    </svg>
                </span>
                {{ __('messages.blog_all_posts_cta') }}
            </a>

            <!-- Header: reading time (mobile only), date and title -->
            <div class="reveal reveal-delay-1">
                <p class="lg:hidden text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-3">
                    {{ $post->read_time_minutes }} {{ __('messages.blog_min_read') }}
                </p>
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-3">
                    {{ $post->published_at->locale(app()->getLocale())->translatedFormat('F Y') }}
                </p>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white mb-6">
                    {{ $post->title }}
                </h1>
            </div>

            <!-- Cover image or placeholder, full width -->
            <div class="rounded-2xl overflow-hidden mb-10 reveal reveal-delay-2 aspect-video">
                @if($post->image_path)
                    <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-primary-500/10 via-secondary-500/10 to-accent-500/10
                                dark:from-primary-500/20 dark:via-secondary-500/20 dark:to-accent-500/20
                                flex items-center justify-center">
                        <svg class="w-20 h-20 text-primary-300 dark:text-primary-600/60"
                             fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                        </svg>
                    </div>
                @endif
            </div>

            <div class="grid lg:grid-cols-3 gap-10">

                <!-- Article body: left 2/3, scrolls with the page -->
                <div class="lg:col-span-2">

                    <!-- Rendered markdown; no reveal here because long articles are taller than the viewport -->
                    <div class="prose prose-slate dark:prose-invert max-w-none
                                text-slate-600 dark:text-slate-300
                                prose-a:text-primary-600 dark:prose-a:text-primary-400">
                        {!! $post->rendered_body !!}
                    </div>

                    <!-- Mobile only -->
                    <div class="lg:hidden mt-10 pt-6 border-t border-slate-200 dark:border-white/10">
                        <x-share-links :post="$post" />
                    </div>
                </div>

                <!-- Sidebar: right 1/3, desktop only, sticky while the article scrolls -->
                <div class="hidden lg:block reveal reveal-delay-3">
                    <div class="sticky top-24 space-y-5">

                        <!-- Reading time -->
                        <x-card :title="__('messages.blog_read_time')">
                            <x-slot name="icon">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/>
                                </svg>
                            </x-slot>
                            <p class="text-sm font-semibold text-slate-600 dark:text-slate-300">
                                {{ $post->read_time_minutes }} {{ __('messages.blog_minutes') }}
                            </p>
                        </x-card>

                        <!-- Share -->
                        <x-card :title="__('messages.blog_share')">
                            <x-slot name="icon">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"/>
                                </svg>
                            </x-slot>
                            <x-share-links :post="$post" />
                        </x-card>

                    </div>
                </div>

            </div>

            <!-- Related articles -->
            @if($relatedPosts->isNotEmpty())
                <div class="mt-16 pt-10 border-t border-slate-200 dark:border-white/10">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-6">
                        {{ __('messages.blog_related_articles') }}
                    </h2>
                    <div class="grid sm:grid-cols-2 gap-6">
                        @foreach($relatedPosts as $related)
                            <x-blog-card :post="$related" :delay="$loop->iteration"/>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </x-page-section>
</div>
