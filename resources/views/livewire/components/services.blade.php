<section id="services" class="relative py-16">
    <div class="relative z-10 container mx-auto px-6">
        <h2 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-8 text-center">{{ __('messages.services_title') }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach ($services as $service)
                <a href="{{ localized_route('service.detail', ['service' => $service->name]) }}"
                   class="bg-white/5 dark:bg-gray-900/5 backdrop-blur-lg rounded-lg shadow-[0px_0px_30px_5px_rgba(0,0,0,0.1)] dark:shadow-[0px_0px_30px_5px_rgba(255,255,255,0.1)] [transform:perspective(800px)_rotateY(10deg)] hover:[transform:perspective(800px)_rotateY(-10deg)] hover:z-10 p-6 text-center delay-150 duration-300 border border-white/10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-900 group">
                    <!-- Icon -->
                    <div class="bg-center bg-cover bg-img-bg p-5 rounded-lg">
                        <svg
                            class="h-24 w-24 mx-auto mb-4 text-blue-600 dark:text-blue-400 delay-150 duration-300 group-hover:-translate-x-8"
                            fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="{{ $service->icon }}"></path>
                        </svg>
                    </div>
                    <!-- Text -->
                    <div class="text-center mt-4 text-gray-900">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 group-hover:text-darkRed delay-150 duration-300 mb-2">{{ $service->translated_title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $service->translated_description }}</p>
                    </div>
                </a>
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
    <img src="{{ asset('images/red-planet-5.svg') }}" alt="Red Planet Vector"
         class="animate-planet-spin-pulse absolute right-1/3 bottom-32 drop-shadow-[0_0_15px_rgba(255,100,0,0.7)]">
</section>
