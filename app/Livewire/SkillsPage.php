<?php

namespace App\Livewire;

use App\Models\Skill;
use Livewire\Component;

class SkillsPage extends Component
{
    public ?string $openSlug = null;

    public function mount(?string $slug = null): void
    {
        $this->openSlug = $slug;
    }

    public function render()
    {
        $skills = Skill::orderByDesc('proficiency')->get();

        return view('livewire.pages.skills-page', compact('skills'))
            ->layout('layouts.app', [
                'title' => __('messages.skills_title') . ' — ' . __('messages.site_title'),
            ]);
    }
}
