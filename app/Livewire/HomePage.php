<?php

namespace App\Livewire;

use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Service;
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

        // Latest 3 posts in the current language, used by the homepage blog preview
        $latestPosts = BlogPost::locale(app()->getLocale())
            ->with('category')
            ->latest('published_at')
            ->take(3)
            ->get();

        $metaTitle = app()->getLocale() === 'de'
            ? 'Darko Cekovski — Laravel Full-Stack Entwickler'
            : 'Darko Cekovski — Laravel Full-Stack Developer';

        $metaDescription = app()->getLocale() === 'de'
            ? 'Full-Stack-Laravel-Entwickler spezialisiert auf Livewire, Tailwind CSS und Alpine.js. Konstanz, Deutschland. Remote seit 2020.'
            : 'Full-stack Laravel developer specialising in Livewire, Tailwind CSS and Alpine.js. Based in Constance, Germany. Remote since 2020.';

        $canonical = url(app()->getLocale() . '/');

        if ($this->openService) {
            $service = Service::where('name', $this->openService)->first();
            if ($service) {
                $metaTitle       = $service->translated_title . ' — Darko Cekovski';
                $metaDescription = $service->translated_description;
                $canonical       = url(app()->getLocale() . '/service/' . $this->openService);
            }
        }

        return view('livewire.pages.home-page', compact('projects', 'latestPosts'))
            ->layout('layouts.app', [
                'title'           => $metaTitle,
                'metaTitle'       => $metaTitle,
                'metaDescription' => $metaDescription,
                'canonical'       => $canonical,
            ]);
    }
}
