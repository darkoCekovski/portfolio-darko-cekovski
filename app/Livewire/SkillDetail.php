<?php

namespace App\Livewire;

use App\Models\Skill;
use Livewire\Component;
use Illuminate\Support\Str;

class SkillDetail extends Component
{
    public $skill;

    public function mount($slug)
    {
        $this->skill = Skill::where('name', Str::title(str_replace('-', ' ', $slug)))->firstOrFail();
    }

    public function render()
    {
        return view('livewire.pages.skill-detail')
            ->layout('layouts.app', ['title' => $this->skill->name . ' - ' . __('messages.site_title')]);
    }
}
