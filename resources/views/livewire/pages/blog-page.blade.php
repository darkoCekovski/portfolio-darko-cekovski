<div>
    <x-page-section>
        <div class="max-w-6xl mx-auto">

            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white mb-2 reveal">
                {{ __('messages.blog_title') }}
            </h1>
            <p class="text-slate-600 dark:text-slate-300 mb-10 reveal reveal-delay-1">
                {{ __('messages.blog_subtitle') }}
            </p>

            <div class="grid lg:grid-cols-3 gap-10">

                <nav class="flex gap-2 overflow-x-auto pb-2 lg:pb-0
                            lg:flex-col lg:overflow-visible lg:sticky lg:top-24 lg:self-start
                            reveal reveal-delay-2">
                    <button wire:click="showLatest"
                            class="flex-shrink-0 lg:w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold
                                   transition-colors duration-200
                                   {{ !$category
                                        ? 'bg-primary-500 text-white'
                                        : 'text-slate-600 dark:text-slate-300 hover:bg-primary-50 dark:hover:bg-primary-500/10' }}">
                        {{ __('messages.blog_filter_latest') }}
                    </button>

                    @foreach($categories as $cat)
                        <button wire:click="filterByCategory('{{ $cat->slug }}')"
                                class="flex-shrink-0 lg:w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold
                                       transition-colors duration-200
                                       {{ $category === $cat->slug
                                            ? 'bg-primary-500 text-white'
                                            : 'text-slate-600 dark:text-slate-300 hover:bg-primary-50 dark:hover:bg-primary-500/10' }}">
                            {{ $cat->name }}
                        </button>
                    @endforeach
                </nav>

                <div class="lg:col-span-2 reveal reveal-delay-3">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @forelse($posts as $post)
                            <x-blog-card :post="$post" />
                        @empty
                            <p class="text-slate-500 dark:text-slate-400 lg:col-span-2">
                                {{ __('messages.blog_empty') }}
                            </p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </x-page-section>
</div>
