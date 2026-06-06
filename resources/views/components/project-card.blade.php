@props([
    'project' => null,
    'delay'   => 1,
])

<a href="{{ localized_route('project.detail', ['id' => $project->id]) }}"
   class="group rounded-2xl bg-white dark:bg-white/[0.03] border border-slate-200 dark:border-white/[0.08]
          overflow-hidden hover:border-indigo-300 dark:hover:border-indigo-500/40
          transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10
          card-glow reveal reveal-delay-{{ $delay }}">

    @if($project->thumbnail)
        <div class="bg-slate-100 dark:bg-white/5 aspect-video overflow-hidden">
            <img src="{{ $project->thumbnail }}"
                 alt="{{ $project->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        </div>
    @endif

    <div class="p-5">
        <h3 class="text-slate-900 dark:text-white font-semibold group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors mb-2">
            {{ $project->title }}
        </h3>
        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">
            {{ $project->description }}
        </p>
        <div class="flex flex-wrap gap-1.5">
            @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                <x-tech-badge>{{ $tech }}</x-tech-badge>
            @endforeach
        </div>
    </div>

</a>
