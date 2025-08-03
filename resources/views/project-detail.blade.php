<div>
    @extends('layouts.app')

    @section('title', $project->title . ' - ' . __('messages.site_title'))
    @section('content')
        <section class="py-16">
            <div class="container mx-auto px-6">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ $project->title }}</h1>
                <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" class="w-full max-w-lg mx-auto rounded-lg mb-6">
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">{{ $project->description }}</p>
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('messages.project_detail_tech') }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">{{ $project->tech_stack }}</p>
                </div>
                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}" class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition mr-4">{{ __('messages.project_detail_demo') }}</a>
                @endif
                @if ($project->github_url)
                    <a href="{{ $project->github_url }}" class="inline-block bg-gray-600 dark:bg-gray-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition">{{ __('messages.project_detail_github') }}</a>
                @endif
            </div>
        </section>
    @endsection
</div>

