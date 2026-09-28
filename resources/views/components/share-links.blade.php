@props(['post'])

@php
    // Current page URL and post title, URL-encoded for the share intents
    $shareUrl   = urlencode(url()->current());
    $shareTitle = urlencode($post->title);

    // Shared chip style, matches the filter chips on the blog and projects pages
    $btn = 'w-9 h-9 flex items-center justify-center rounded-lg transition-all duration-200
            bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-400
            border border-slate-200 dark:border-white/10
            hover:bg-primary-600 hover:text-white hover:border-primary-600
            dark:hover:bg-primary-600 dark:hover:text-white dark:hover:border-primary-600';
@endphp

<div class="flex items-center gap-3">

    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
       target="_blank" rel="noopener"
       class="{{ $btn }}"
       aria-label="Share on LinkedIn">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 1 1 0-4.124 2.062 2.062 0 0 1 0 4.124zM7.119 20.452H3.554V9h3.565v11.452z"/>
        </svg>
    </a>

    <!-- X -->
    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
       target="_blank" rel="noopener"
       class="{{ $btn }}"
       aria-label="Share on X">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
        </svg>
    </a>

    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
       target="_blank" rel="noopener"
       class="{{ $btn }}"
       aria-label="Share on Facebook">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M22 12.061C22 6.505 17.523 2 12 2S2 6.505 2 12.061c0 5.022 3.657 9.184 8.438 9.939v-7.03H7.898v-2.909h2.54V9.845c0-2.522 1.492-3.916 3.777-3.916 1.094 0 2.238.197 2.238.197v2.476h-1.26c-1.243 0-1.63.775-1.63 1.57v1.888h2.773l-.443 2.909h-2.33V22c4.78-.755 8.437-4.917 8.437-9.939z"/>
        </svg>
    </a>

</div>
