<div>
    @section('title', 'Home - Darko Cekovski Portfolio')
    @section('content')
        <!-- Hero Section -->
        <section class="bg-gray-100 dark:bg-gray-800 py-20">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-5xl font-bold text-gray-800 dark:text-gray-200 mb-4">Hi, I'm Darko Cekovski</h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">A passionate web developer building modern
                    applications with Laravel and Tailwind CSS.</p>
                <a href="{{ route('projects') }}"
                   class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">View
                    My Projects</a>
            </div>
        </section>

        <!-- About Section -->
        <section class="py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">About Me</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">I'm a web developer with a focus on creating
                    user-friendly and efficient applications using modern technologies like Laravel, Tailwind CSS, and
                    Livewire. I love turning ideas into reality through clean code and creative solutions.</p>
                <div class="text-center">
                    <a href="{{ route('about') }}"
                       class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">Learn
                        More About Me</a>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section class="bg-gray-100 dark:bg-gray-800 py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">My Skills</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach (['Laravel', 'Tailwind CSS', 'Livewire', 'PHP', 'MySQL', 'JavaScript'] as $skill)
                        <div class="bg-white dark:bg-gray-900 p-4 rounded-lg shadow-md text-center">
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $skill }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">Featured Projects</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($projects as $project)
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                                 class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $project->title }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 mt-2">{{ Str::limit($project->description, 100) }}</p>
                                <a href="{{ route('project.detail', $project->id) }}"
                                   class="inline-block mt-4 text-blue-600 dark:text-blue-400 hover:underline">View
                                    Details</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="{{ route('projects') }}"
                       class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">See
                        All Projects</a>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="bg-gray-100 dark:bg-gray-800 py-16">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">Get in Touch</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">Have a project idea or want to collaborate?
                    Feel free to reach out!</p>
                <a href="{{ route('contact') }}"
                   class="inline-block bg-blue-600 dark:bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">Contact
                    Me</a>
            </div>
        </section>
    @endsection
</div>


