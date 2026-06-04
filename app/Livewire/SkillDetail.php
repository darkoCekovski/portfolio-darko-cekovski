<?php

namespace App\Livewire;

use App\Models\Skill;
use Livewire\Component;

class SkillDetail extends Component
{
    public $skill;

    public function mount($slug)
    {
        $this->skill = Skill::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.pages.skill-detail')
            ->layout('layouts.app', ['title' => $this->skill->name . ' - ' . __('messages.site_title')]);
    }
}
