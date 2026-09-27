@props(['post'])

<a href="{{ localized_route('blog.detail', ['slug' => $post->slug]) }}"
   class="group block rounded-2xl overflow-hidden bg-white dark:bg-slate-800/50 border border-slate-200
          dark:border-slate-700/50 hover:border-primary-300 dark:hover:border-primary-500/50
          transition-colors duration-200">

    <div class="aspect-video overflow-hidden bg-gradient-to-br from-primary-500/10 via-secondary-500/10 to-accent-500/10
                dark:from-primary-500/20 dark:via-secondary-500/20 dark:to-accent-500/20">
        @if($post->image_path)
            <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @endif
    </div>

    <div class="p-5">
        <h3 class="font-bold text-slate-900 dark:text-white mb-2 line-clamp-2">
            {{ $post->title }}
        </h3>
        <p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-2 mb-3">
            {{ $post->excerpt }}
        </p>
        <span class="text-xs font-bold uppercase tracking-widest text-primary-600 dark:text-primary-400">
            {{ $post->category->name }}
        </span>
        <p class="text-xs text-slate-400 dark:text-slate-500 mt-1">
            {{ $post->published_at->locale(app()->getLocale())->translatedFormat('F Y') }}
        </p>
    </div>
</a>
