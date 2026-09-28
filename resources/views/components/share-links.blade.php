@props(['post'])

@php
    // Current page URL and post title, URL-encoded for the share intents
    $shareUrl   = urlencode(url()->current());
    $shareTitle = urlencode($post->title);

    // Same button style as the footer social links
    $btn = 'w-9 h-9 rounded-lg bg-slate-100 dark:bg-white/5 flex items-center justify-center
            text-slate-500 dark:text-slate-400
            hover:text-primary-600 dark:hover:text-primary-400
            hover:bg-primary-50 dark:hover:bg-primary-500/10
            transition-all duration-200';
@endphp

<div class="flex items-center gap-3">

    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
       target="_blank" rel="noopener"
       class="{{ $btn }}"
       aria-label="Share on LinkedIn">
        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
        </svg>
    </a>

    <!-- X -->
    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
       target="_blank" rel="noopener"
       class="{{ $btn }}"
       aria-label="Share on X">
        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.836L1.254 2.25H8.08l4.253 5.622 5.91-5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
        </svg>
    </a>

    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
       target="_blank" rel="noopener"
       class="{{ $btn }}"
       aria-label="Share on Facebook">
        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M22 12.061C22 6.505 17.523 2 12 2S2 6.505 2 12.061c0 5.022 3.657 9.184 8.438 9.939v-7.03H7.898v-2.909h2.54V9.845c0-2.522 1.492-3.916 3.777-3.916 1.094 0 2.238.197 2.238.197v2.476h-1.26c-1.243 0-1.63.775-1.63 1.57v1.888h2.773l-.443 2.909h-2.33V22c4.78-.755 8.437-4.917 8.437-9.939z"/>
        </svg>
    </a>

</div>
