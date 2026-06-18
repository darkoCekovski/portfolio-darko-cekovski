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

        $metaTitle = app()->getLocale() === 'de'
            ? 'Skills — Darko Cekovski'
            : 'Skills — Darko Cekovski';

        $metaDescription = app()->getLocale() === 'de'
            ? 'Technologien, mit denen ich täglich arbeite — Laravel, Livewire, Tailwind CSS, Alpine.js, PHP, MySQL und mehr.'
            : 'Technologies I work with daily — Laravel, Livewire, Tailwind CSS, Alpine.js, PHP, MySQL and more.';

        $canonical = url(app()->getLocale() . '/skills');

        if ($this->openSlug) {
            $skill = Skill::where('slug', $this->openSlug)->first();
            if ($skill) {
                $metaTitle       = $skill->name . ' — Darko Cekovski';
                $metaDescription = $skill->description
                    ?? $skill->name . ' — skill of Darko Cekovski, Laravel Full-Stack Developer.';
                $canonical       = url(app()->getLocale() . '/skill/' . $this->openSlug);
            }
        }

        return view('livewire.pages.skills-page', compact('skills'))
            ->layout('layouts.app', [
                'title'           => $metaTitle,
                'metaTitle'       => $metaTitle,
                'metaDescription' => $metaDescription,
                'canonical'       => $canonical,
            ]);
    }
}
