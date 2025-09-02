<div>
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">{{ __('messages.projects_title') }}</h1>

            <!-- Search Input -->
            <form class="mb-8 max-w-md mx-auto relative">
                <div class="relative">
                    <input type="text" wire:model.live.debounce="search" placeholder="{{ __('messages.search_projects') }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white pr-10">
                    @if (!empty($search))
                        <button type="button" wire:click="clearSearch" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    @endif
                </div>
            </form>

            <!-- Filter Buttons -->
            <div class="mb-8 flex flex-wrap gap-2 justify-center">
                <button wire:click="toggleFilter('all')" class="{{ empty($filterTechs) ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }} px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white transition duration-200">
                    {{ __('messages.filter_all') }}
                </button>
                @foreach ($technologies as $tech)
                    <button wire:click="toggleFilter(@js($tech))" class="{{ in_array($tech, $filterTechs) ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }} px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white transition duration-200">
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
