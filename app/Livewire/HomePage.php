<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Skill;
use Livewire\Component;

class HomePage extends Component
{
    public $projects;
    public $skills;

    public function mount()
    {
        $this->projects = Project::latest()->take(3)->get();
        $this->skills = Skill::all();
    }

    public function render()
    {
        return view('livewire.pages.home-page')->layout('layouts.app', ['title' => __('messages.site_title')]);
    }
}
