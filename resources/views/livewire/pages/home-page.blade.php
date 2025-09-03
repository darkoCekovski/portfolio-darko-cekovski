<div>
    @section('title', __('messages.site_title'))
        <!-- Hero Section -->
        <section class="bg-gray-100 dark:bg-gray-800 py-20">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-5xl font-bold text-gray-800 dark:text-gray-200 mb-4">{{ __('messages.hero_title') }}</h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">{{ __('messages.hero_subtitle') }}</p>
                <a href="{{ localized_route('projects') }}"
                   class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">{{ __('messages.hero_cta') }}</a>
            </div>
        </section>

    <!-- Services Section -->
    <livewire:services />

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
        <section class="container mx-auto px-6 py-12">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ __('messages.skills_title') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($skills as $skill)
                    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md flex items-center space-x-4">
                        <img src="{{ $skill->logo }}" alt="{{ $skill->name }} Logo" class="w-16 h-16">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $skill->name }}</h3>
                            <div class="w-24 bg-gray-200 dark:bg-gray-700 h-2 rounded-full">
                                <div class="bg-blue-600 h-2 rounded-full"
                                     style="width: {{ $skill->proficiency * 10 }}%"></div>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $skill->proficiency }}/10</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 text-center">
                <a href="{{ localized_route('skills') }}"
                   class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                    {{ __('messages.skills_all_cta') }}
                </a>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="py-16">
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
        </section>

        <!-- Contact Section -->
        <section class="bg-gray-100 dark:bg-gray-800 py-16">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ __('messages.contact_title') }}</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">{{ __('messages.contact_text') }}</p>
                <a href="{{ localized_route('contact') }}"
                   class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">{{ __('messages.contact_cta') }}</a>
            </div>
        </section>
</div>




