<div class="container mx-auto px-6 py-12">
    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-[0_4px_6px_rgba(0,0,0,0.1)] dark:shadow-[0_4px_6px_rgba(255,255,255,0.1)] p-8">
        <!-- Icon -->
        <div class="flex justify-center mb-6">
            <svg
                class="h-24 w-24 text-blue-600 dark:text-blue-400"
                fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="{{ $service->icon }}"></path>
            </svg>
        </div>
        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-4 text-center">{{ $service->translated_title }}</h1>
        <!-- Description -->
        <p class="text-gray-600 dark:text-gray-400 mb-6">{{ $service->translated_description }}</p>
        <!-- Back Link -->
        <div class="text-center">
            <a href="{{ localized_route('home') }}#services"
               class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition shadow-[0_4px_6px_rgba(0,0,0,0.1)] dark:shadow-[0_4px_6px_rgba(255,255,255,0.1)]">
                {{ __('messages.back_to_home') }}
            </a>
        </div>
    </div>
</div>
