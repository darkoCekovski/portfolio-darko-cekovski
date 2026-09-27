<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['slug' => 'ai', 'name_en' => 'AI', 'name_de' => 'KI', 'sort_order' => 1],
            ['slug' => 'laravel', 'name_en' => 'Laravel', 'name_de' => 'Laravel', 'sort_order' => 2],
            ['slug' => 'livewire', 'name_en' => 'Livewire', 'name_de' => 'Livewire', 'sort_order' => 3],
            ['slug' => 'tailwind-css', 'name_en' => 'Tailwind CSS', 'name_de' => 'Tailwind CSS', 'sort_order' => 4],
            ['slug' => 'web-development', 'name_en' => 'Web Development', 'name_de' => 'Webentwicklung', 'sort_order' => 5],
        ];

        foreach ($categories as $category) {
            BlogCategory::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
