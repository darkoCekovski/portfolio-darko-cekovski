<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectDetail extends Component
{
    public $project;

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pages.project-detail')
            ->layout('layouts.app', ['title' => $this->project->title . ' - ' . __('messages.site_title')]);
    }
}
