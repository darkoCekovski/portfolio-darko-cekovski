<div>
    @section('title', __('messages.site_title'))
    @section('content')
        <section class="py-16">
            <div class="container mx-auto px-6">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">{{ __('messages.contact_title') }}</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">{{ __('messages.contact_text') }}</p>
            </div>
        </section>
    @endsection
</div>
