<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class BlogDetail extends Component
{
    public BlogPost $post;

    public function mount(string $slug): void
    {
        $this->post = BlogPost::locale(app()->getLocale())
            ->where('slug', $slug)
            ->with('category')
            ->firstOrFail();
    }

    public function render()
    {
        $relatedPosts = $this->post->relatedPosts();

        $canonical = url(app()->getLocale() . '/blog/' . $this->post->slug);

        return view('livewire.pages.blog-detail', compact('relatedPosts'))
            ->layout('layouts.app', [
                'title' => $this->post->title . ' — Darko Cekovski',
                'metaTitle' => $this->post->title . ' — Darko Cekovski',
                'metaDescription' => $this->post->excerpt,
                'canonical' => $canonical,
                'ogImage' => $this->post->image_path ? Storage::url($this->post->image_path) : null,
            ]);
    }
}
