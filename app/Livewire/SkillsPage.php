<?php

namespace App\Livewire;

use App\Models\Skill;
use Livewire\Component;

class SkillsPage extends Component
{
    public $skills;

    public function mount()
    {
        $this->skills = Skill::all();
    }

    public function render()
    {
        return view('livewire.skills-page')->layout('layouts.app', ['title' => __('messages.skills_title')]);
    }
}
