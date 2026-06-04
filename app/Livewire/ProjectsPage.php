<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

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
    }

    public function render()
    {
        $query = Project::query();

        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->whereRaw('LOWER(title) LIKE ?', [$searchTerm])
                    ->orWhereRaw('LOWER(description) LIKE ?', [$searchTerm])
                    ->orWhereRaw('JSON_SEARCH(LOWER(JSON_EXTRACT(tech_stack, "$[*]")), "one", LOWER(?)) IS NOT NULL', [$this->search]);
            });
        }

        if (!empty($this->filterTechs)) {
            foreach ($this->filterTechs as $tech) {
                $query->whereJsonContains('tech_stack', $tech);
            }
        }

        $projects = $query->get();

        $technologies = Project::pluck('tech_stack')
            ->map(fn($techStack) => is_array($techStack) ? $techStack : json_decode($techStack, true))
            ->flatten()
            ->unique()
            ->values()
            ->toArray();

        return view('livewire.pages.projects-page', [
            'projects'     => $projects,
            'technologies' => $technologies,
        ])->layout('layouts.app', ['title' => __('messages.projects_title') . ' - ' . __('messages.site_title')]);
    }
}
