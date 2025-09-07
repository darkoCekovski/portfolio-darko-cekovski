<section class="relative py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-8 text-center">{{ __('messages.services_title') }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach ($services as $service)
                <div
                    class="bg-white dark:bg-black rounded-lg shadow-[0px_0px_50px_9px_rgba(0,0,0,0.20)] dark:shadow-[0px_0px_50px_9px_rgba(255,255,255,0.20)] p-6 text-center">
                    <svg class="h-12 w-12 mx-auto mb-4 text-blue-600 dark:text-blue-400" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="{{ $service->icon }}"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $service->translated_title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $service->translated_description }}</p>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ localized_route('contact') }}"
               class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition shadow-[0_4px_6px_rgba(0,0,0,0.1)] dark:shadow-[0_4px_6px_rgba(255,255,255,0.1)]">
                {{ __('messages.contact_cta') }}
            </a>
        </div>
    </div>

    <img src="{{ asset('images/red-planet-4.svg') }}" alt="Red Planet Vector"
         class="absolute right-0 top-10 drop-shadow-[0_0_15px_rgba(255,100,0,0.7)]">
</section>
