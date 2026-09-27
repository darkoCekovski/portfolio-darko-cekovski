<?php
// database/seeders/BlogPostSeeder.php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $category = BlogCategory::where('slug', 'laravel')->firstOrFail();

        // group_uuid links the EN and DE rows of the same post
        $groupUuid = (string) Str::uuid();

        BlogPost::updateOrCreate(
            ['group_uuid' => $groupUuid, 'locale' => 'en'],
            [
                'category_id' => $category->id,
                'title' => 'Why I Migrated My Portfolio to Livewire 3',
                'slug' => 'why-i-migrated-my-portfolio-to-livewire-3',
                'body' => "## Introduction\n\nA short writeup on the migration decision and the tradeoffs...",
                'image_path' => null,
                'published_at' => now(),
            ]
        );

        BlogPost::updateOrCreate(
            ['group_uuid' => $groupUuid, 'locale' => 'de'],
            [
                'category_id' => $category->id,
                'title' => 'Warum ich mein Portfolio auf Livewire 3 migriert habe',
                'slug' => 'warum-ich-mein-portfolio-auf-livewire-3-migriert-habe',
                'body' => "## Einleitung\n\nEine kurze Zusammenfassung der Migrationsentscheidung...",
                'image_path' => null,
                'published_at' => now(),
            ]
        );
    }
}
