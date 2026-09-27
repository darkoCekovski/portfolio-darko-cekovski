<div>
    <x-page-section>
        <div class="max-w-5xl mx-auto">

            {{-- Back --}}
            <a href="{{ localized_route('blog') }}"
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

            <div class="grid lg:grid-cols-3 gap-10">

                {{-- Main content: left 2/3, scrolls with the page --}}
                <div class="lg:col-span-2 reveal reveal-delay-1">

                    {{-- Mobile-only: read time sits above the title --}}
                    <p class="lg:hidden text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-3">
                        {{ $post->read_time_minutes }} {{ __('messages.blog_min_read') }}
                    </p>

                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                        {{ $post->published_at->locale(app()->getLocale())->translatedFormat('F Y') }}
                    </p>

                    <h1 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white mb-8">
                        {{ $post->title }}
                    </h1>

                    @if($post->image_path)
                        <div class="rounded-2xl overflow-hidden mb-10 aspect-video">
                            <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}"
                                 class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="prose prose-slate dark:prose-invert max-w-none">
                        {!! $post->rendered_body !!}
                    </div>

                    {{-- Mobile-only: share options sit under the text --}}
                    <div class="lg:hidden mt-10 pt-6 border-t border-slate-200 dark:border-slate-700">
                        <x-share-links :post="$post" />
                    </div>

                    {{-- Related articles --}}
                    @if($relatedPosts->isNotEmpty())
                        <div class="mt-16 pt-10 border-t border-slate-200 dark:border-slate-700">
                            <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-6">
                                {{ __('messages.blog_related_articles') }}
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($relatedPosts as $related)
                                    <x-blog-card :post="$related" />
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Sidebar: right 1/3, sticky, does not scroll with the long body text --}}
                <div class="hidden lg:block reveal reveal-delay-2">
                    <div class="sticky top-24 space-y-6">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">
                            {{ $post->read_time_minutes }} {{ __('messages.blog_min_read') }}
                        </p>
                        <x-share-links :post="$post" />
                    </div>
                </div>

            </div>
        </div>
    </x-page-section>
</div>
