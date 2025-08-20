@extends('layouts.app')
@section('title', $skill->name . ' - ' . __('messages.site_title'))
@section('content')
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ $skill->name }}</h2>
        <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-6">
                <img src="{{ $skill->logo }}" alt="{{ $skill->name }} Logo" class="w-32 h-32">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">{{ $skill->name }}</h3>
                    <div class="w-64 bg-gray-200 dark:bg-gray-700 h-3 rounded-full mb-4">
                        <div class="bg-blue-600 h-3 rounded-full" style="width: {{ $skill->proficiency * 10 }}%"></div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>{{ __('messages.skill_proficiency', 'Proficiency') }}:</strong> {{ $skill->proficiency }}/10</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>{{ __('messages.skill_description', 'Description') }}:</strong> {{ $skill->description }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>{{ __('messages.skill_learning_source', 'Learned From') }}:</strong> {{ $skill->learning_source }}</p>
                    <p class="text-gray-600 dark:text-gray-400"><strong>{{ __('messages.skill_experience', 'Experience') }}:</strong> {{ $skill->experience_duration }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
