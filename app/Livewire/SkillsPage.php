<?php

namespace App\Livewire;

use App\Models\Skill;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SkillsPage extends Component
{
    public $skills;

    public function mount()
    {
        try {
            $this->skills = Skill::all();
            Log::info('SkillsPage: Retrieved skills', [
                'count' => $this->skills->count(),
                'skills' => $this->skills->toArray(),
                'locale' => app()->getLocale(),
            ]);
        } catch (\Exception $e) {
            Log::error('SkillsPage: Failed to retrieve skills', [
                'error' => $e->getMessage(),
                'locale' => app()->getLocale(),
            ]);
            $this->skills = collect();
        }
    }

    public function render()
    {
        return view('livewire.pages.skills-page')->layout('layouts.app', ['title' => __('messages.skills_title')]);
    }
}
