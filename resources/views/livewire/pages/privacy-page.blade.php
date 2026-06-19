<div>
    <x-page-header
        :eyebrow="__('messages.privacy_eyebrow')"
        :title="__('messages.privacy_title')"
        :subtitle="__('messages.privacy_subtitle')"
    />

    <x-page-section>
        <div class="max-w-3xl mx-auto reveal
                    prose prose-slate dark:prose-invert
                    prose-headings:font-bold prose-headings:text-slate-900 dark:prose-headings:text-white
                    prose-a:text-primary-600 dark:prose-a:text-primary-400
                    prose-p:text-slate-600 dark:prose-p:text-slate-300
                    prose-li:text-slate-600 dark:prose-li:text-slate-300">

            @if(app()->getLocale() === 'de')
                @include('legal.privacy-de')
            @else
                @include('legal.privacy-en')
            @endif

        </div>
    </x-page-section>
</div>
