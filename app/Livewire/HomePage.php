<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class HomePage extends Component
{
    public ?string $openService = null;

    public function mount(?string $name = null): void
    {
        $this->openService = $name;
    }

    public function render()
    {
        $projects = Project::latest()->take(3)->get();

        return view('livewire.pages.home-page', compact('projects'))->layout('layouts.app', ['title' => __('messages.site_title')]);
    }
}
