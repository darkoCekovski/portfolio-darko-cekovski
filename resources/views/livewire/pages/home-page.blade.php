<div>
    @section('title', __('messages.site_title'))

    <!-- Hero Section -->
    <section class="relative">
        <div class="relative z-10 container mx-auto px-6 pt-[250px]">
            <div class=" flex flex-col lg:flex-row max-lg:space-y-10 lg:space-x-20">
                <div class="basis-1/2 text-left">
                    <h1 class="text-6xl font-bold text-gray-800 dark:text-gray-200 mb-4">Hello. I'm Darko.<br />
                        <span class="">A <span class="relative text-gray-300"> Frontend
                            <img class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" src="{{ asset('images/glow-text.png') }}" alt="Glow">
                            </span> Developer</span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">Experience cutting-edge solutions designed
                        to elevate productivity and deliver results like never before.</p>
                    <a href="{{ localized_route('projects') }}"
                       class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">{{ __('messages.hero_cta') }}</a>
                </div>
                <div class="relative basis-1/2 flex items-start justify-center">
                    <img class="h-[150px] absolute -translate-x-1/2 -translate-y-1/2 top-0 left-1/2" src="{{asset('images/astronaut.svg')}}" alt="{{ __('Astronaut') }}">
                    <img class="h-[650px]" src="{{asset('images/earth.svg')}}" alt="{{ __('Earth') }}">
                </div>
            </div>
        </div>
{{--        <img src="{{ asset('images/rocket.svg') }}" alt="Rocket Vector"--}}
{{--             class="absolute z-10 left-1/2 top-[70%] animate-rocket-launch drop-shadow-[0_0_15px_rgba(255,100,0,0.7)]">--}}
        <img src="{{ asset('images/red-planet-2.svg') }}" alt="Red Planet Vector"
             class="animate-planet-spin-pulse absolute right-20 top-20 drop-shadow-[0_0_15px_rgba(255,100,0,0.7)]">
        <img src="{{ asset('images/red-planet-5.svg') }}" alt="Red Planet Vector"
             class="animate-planet-spin-pulse absolute left-[10%] bottom-10 drop-shadow-[0_0_15px_rgba(255,100,0,0.7)]">
    </section>

    <!-- Services Section -->
    <livewire:services/>

    <!-- About Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">{{ __('messages.about_title') }}</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">{{ __('messages.about_text') }}</p>
            <div class="text-center">
                <a href="{{ localized_route('about') }}"
                   class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">{{ __('messages.about_cta') }}</a>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <livewire:skills/>

    <!-- Projects Section -->
    <section class="relative py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">{{ __('messages.projects_title') }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($projects as $project)
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                        <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $project->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ Str::limit($project->description, 100) }}</p>
                            <a href="{{ localized_route('project.detail', ['id' => $project->id]) }}"
                               class="inline-block mt-4 text-blue-600 dark:text-blue-400 hover:underline">{{ __('messages.project_detail_demo') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ localized_route('projects') }}"
                   class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">{{ __('messages.projects_all_cta') }}</a>
            </div>
        </div>
        <img src="{{ asset('images/red-planet-3.svg') }}" alt="Red Planet Vector"
             class="absolute left-40 top-2 drop-shadow-[0_0_15px_rgba(255,100,0,0.7)]">
        <img src="{{ asset('images/red-planet-1.svg') }}" alt="Red Planet Vector"
             class="animate-planet-spin-pulse absolute right-32 bottom-2 drop-shadow-[0_0_15px_rgba(255,100,0,0.7)]">
    </section>

    <!-- Contact Section -->
    <section class="py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ __('messages.contact_title') }}</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">{{ __('messages.contact_text') }}</p>
            <a href="{{ localized_route('contact') }}"
               class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">{{ __('messages.contact_cta') }}</a>
        </div>
    </section>
</div>




