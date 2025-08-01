<div>
    @section('title', 'Projects - Darko Cekovski Portfolio')
    @section('content')
        <section class="py-16">
            <div class="container mx-auto px-6">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">My Projects</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($projects as $project)
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $project->title }}</h2>
                                <p class="text-gray-600 dark:text-gray-400 mt-2">{{ Str::limit($project->description, 100) }}</p>
                                <a href="{{ route('project.detail', $project->id) }}" class="inline-block mt-4 text-blue-600 dark:text-blue-400 hover:underline">View Details</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection
</div>
