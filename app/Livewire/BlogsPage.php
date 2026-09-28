<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Livewire\Attributes\Url;
use Livewire\Component;

class BlogsPage extends Component
{
    #[Url(as: 'category')]
    public ?string $category = null;

    // Clears the active filter — used by the "Latest" button
    public function showLatest(): void
    {
        $this->category = null;
    }

    // Sets the active category filter, reflected in the URL as ?category=slug
    public function filterByCategory(string $slug): void
    {
        $this->category = $slug;
    }

    public function render()
    {
        $categories = BlogCategory::orderBy('sort_order')->get();

        $posts = BlogPost::locale(app()->getLocale())
            ->with('category')
            ->category($this->category)
            ->latest('published_at')
            ->get();

        $metaTitle = 'Blog — Darko Cekovski';

        $metaDescription = app()->getLocale() === 'de'
            ? 'Notizen über Laravel, Livewire, Tailwind CSS und KI aus der täglichen Entwicklungsarbeit.'
            : 'Notes on Laravel, Livewire, Tailwind CSS and AI from day-to-day development work.';

        $canonical = url(app()->getLocale() . '/blog');

        if ($this->category) {
            $activeCategory = $categories->firstWhere('slug', $this->category);

            if ($activeCategory) {
                $metaTitle = $activeCategory->name . ' — Blog — Darko Cekovski';
                $metaDescription = app()->getLocale() === 'de'
                    ? 'Blogbeiträge über ' . $activeCategory->name . '.'
                    : 'Blog posts about ' . $activeCategory->name . '.';
                $canonical = url(app()->getLocale() . '/blog?category=' . $activeCategory->slug);
            }
        }

        return view('livewire.pages.blogs-page', compact('categories', 'posts'))
            ->layout('layouts.app', [
                'title' => $metaTitle,
                'metaTitle' => $metaTitle,
                'metaDescription' => $metaDescription,
                'canonical' => $canonical,
            ]);
    }
}
