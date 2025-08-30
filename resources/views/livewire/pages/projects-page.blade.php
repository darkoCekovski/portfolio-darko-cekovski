<div>
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">{{ __('messages.projects_title') }}</h1>

            <!-- Filter Buttons -->
            <div class="mb-8 flex flex-wrap gap-2 justify-start">
                <button wire:click="toggleFilter('all')" class="{{ empty($filterTechs) ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }} px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white transition duration-200">
                    {{ __('messages.filter_all') }}
                </button>
                @foreach ($technologies as $tech)
                    <button wire:click="toggleFilter('{{ $tech }}')" class="{{ in_array($tech, $filterTechs) ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }} px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white transition duration-200">
                        {{ $tech }}
                    </button>
                @endforeach
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($projects as $project)
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                        <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $project->title }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ Str::limit($project->description, 100) }}</p>
                            <p class="text-gray-500 dark:text-gray-500 mt-2">{{ __('messages.project_detail_tech') }}: {{ implode(', ', $project->tech_stack) }}</p>
                            <div class="mt-4">
                                <a href="{{ localized_route('project.detail', ['id' => $project->id]) }}"
                                   class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">
                                    {{ __('messages.project_detail') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400 text-center">{{ __('messages.no_projects') }}</p>
                @endforelse
            </div>
        </div>
    </section>
</div>
