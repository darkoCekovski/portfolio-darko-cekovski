<div>
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ __('messages.skills_title') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($skills as $skill)
                <a href="{{ localized_route('skill.detail', ['slug' => \Illuminate\Support\Str::slug($skill->name)]) }}"
                   class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow flex items-center space-x-4">
                    <img src="{{ $skill->logo }}" alt="{{ $skill->name }} Logo" class="w-16 h-16">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $skill->name }}</h3>
                        <div class="w-32 bg-gray-200 dark:bg-gray-700 h-2 rounded-full">
                            <div class="bg-blue-600 h-2 rounded-full"
                                 style="width: {{ $skill->proficiency * 10 }}%"></div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $skill->proficiency }}/10</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-600 dark:text-gray-400">{{ __('messages.no_skills') }}</p>
            @endforelse
        </div>
    </section>
</div>



