@props([
    'post',
    'delay' => 1,
])

<a href="{{ localized_route('blog.detail', ['slug' => $post->slug]) }}"
   class="group rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08]
          overflow-hidden hover:border-primary-300 dark:hover:border-primary-500/40
          transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-500/10
          reveal reveal-delay-{{ $delay }}">

    <!-- Cover image / placeholder -->
    <div class="relative aspect-video overflow-hidden bg-slate-100 dark:bg-[#0d1117]">
        @if($post->image_path)
            <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
            <!-- Gradient placeholder with an image icon, shown when the post has no cover image -->
            <div class="w-full h-full bg-gradient-to-br from-primary-500/10 via-secondary-500/10 to-accent-500/10
                        dark:from-primary-500/20 dark:via-secondary-500/20 dark:to-accent-500/20
                        flex items-center justify-center">
                <svg class="w-14 h-14 text-primary-300 dark:text-primary-600/60"
                     fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                </svg>
            </div>
        @endif
    </div>

    <!-- Content -->
    <div class="p-5">
        <h3 class="text-slate-900 dark:text-white font-semibold mb-2 line-clamp-2
                   group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
            {{ $post->title }}
        </h3>
        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">
            {{ $post->excerpt }}
        </p>

        <!-- Category as a badge, same component as the tech badges on project cards -->
        <div class="flex flex-wrap gap-1.5">
            <x-tech-badge>{{ $post->category->name }}</x-tech-badge>
        </div>

        <!-- Publication date: month and year only -->
        <p class="text-xs text-slate-400 dark:text-slate-500 mt-3">
            {{ $post->published_at->locale(app()->getLocale())->translatedFormat('F Y') }}
        </p>
    </div>

</a>
