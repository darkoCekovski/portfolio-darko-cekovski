<div>
    <x-page-header
        :eyebrow="__('messages.imprint_eyebrow')"
        :title="__('messages.imprint_title')"
        :subtitle="__('messages.imprint_subtitle')"
    />

    <x-page-section>
        <div class="max-w-3xl mx-auto reveal
                    prose prose-slate dark:prose-invert
                    prose-headings:font-bold prose-headings:text-slate-900 dark:prose-headings:text-white
                    prose-a:text-primary-600 dark:prose-a:text-primary-400
                    prose-p:text-slate-600 dark:prose-p:text-slate-300
                    prose-li:text-slate-600 dark:prose-li:text-slate-300">

            @if(app()->getLocale() === 'de')
                @include('legal.imprint-de')
            @else
                @include('legal.imprint-en')
            @endif

        </div>
    </x-page-section>
</div>
