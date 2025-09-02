<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class ProjectsPage extends Component
{
    public $filterTechs = [];
    public $search = '';

    public function toggleFilter($tech)
    {
        if ($tech === 'all') {
            $this->filterTechs = [];
        } else {
            if (in_array($tech, $this->filterTechs)) {
                $this->filterTechs = array_diff($this->filterTechs, [$tech]);
            } else {
                $this->filterTechs[] = $tech;
            }
        }
    }

    public function clearSearch()
    {
        $this->search = '';
        Log::info('Search Cleared');
    }

    public function render()
    {
        $query = Project::query();

        // Apply search filter
        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';
            Log::info('Search Term: ' . $this->search, ['length' => strlen($this->search)]);
            $query->where(function ($q) use ($searchTerm) {
                $q->whereRaw('LOWER(title) LIKE ?', [$searchTerm])
                    ->orWhereRaw('LOWER(description) LIKE ?', [$searchTerm])
                    ->orWhereRaw('JSON_SEARCH(LOWER(JSON_EXTRACT(tech_stack, "$[*]")), "one", LOWER(?)) IS NOT NULL', [$this->search]);
            });
        }

        // Apply tech stack filters
        if (!empty($this->filterTechs)) {
            Log::info('Selected Techs: ' . json_encode($this->filterTechs));
            foreach ($this->filterTechs as $tech) {
                $query->whereJsonContains('tech_stack', $tech);
            }
        }

        $projects = $query->get();
        Log::info('Projects found: ' . $projects->count(), ['projects' => $projects->pluck('title')->toArray()]);

        $technologies = Project::pluck('tech_stack')
            ->map(fn($techStack) => is_array($techStack) ? $techStack : json_decode($techStack, true))
            ->flatten()
            ->unique()
            ->values()
            ->toArray();

        Log::info('Technologies: ' . json_encode($technologies));

        return view('livewire.pages.projects-page', [
            'projects' => $projects,
            'technologies' => $technologies,
        ])->layout('layouts.app', ['title' => __('messages.projects_title') . ' - ' . __('messages.site_title')]);
    }
}
