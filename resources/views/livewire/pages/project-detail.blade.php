<div>
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ $project->title }}</h1>
            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                 class="w-full max-w-lg mx-auto rounded-lg mb-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('messages.project_detail_tech') }}</h2>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 mt-2">
                    @foreach ($project->tech_stack as $tech)
                        <li>{{ $tech }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('messages.project_description') }}</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 mt-2">{{ $project->description }}</p>
            </div>
            <div class="flex space-x-4 mb-6">
                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank"
                       class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">
                        {{ __('messages.project_detail_demo') }}
                    </a>
                @endif
                @if ($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank"
                       class="inline-block bg-gray-600 dark:bg-gray-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                        {{ __('messages.project_detail_github') }}
                    </a>
                @endif
            </div>
            <a href="{{ localized_route('projects') }}"
               class="inline-block text-blue-600 dark:text-blue-400 hover:underline">{{ __('messages.projects_all_cta') }}</a>
        </div>
    </section>
</div>
