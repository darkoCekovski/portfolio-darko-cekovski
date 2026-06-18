<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Str;
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
        $metaTitle = $this->project->title . ' — Darko Cekovski';

        $metaDescription = Str::limit(
            strip_tags($this->project->localized_short_description
                ?? $this->project->localized_description
                ?? $this->project->title),
            155
        );

        $ogImage = $this->project->thumbnail
            ? asset($this->project->thumbnail)
            : asset('images/og-default-' . app()->getLocale() . '.png');

        return view('livewire.pages.project-detail')
            ->layout('layouts.app', [
                'title'           => $metaTitle,
                'metaTitle'       => $metaTitle,
                'metaDescription' => $metaDescription,
                'ogImage'         => $ogImage,
                'ogType'          => 'article',
                'canonical'       => url(app()->getLocale() . '/project/' . $this->project->id),
            ]);
    }
}
