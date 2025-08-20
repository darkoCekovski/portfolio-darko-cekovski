<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('skills')->insert([
            [
                'name' => 'Laravel',
                'description' => 'Proficient in building web applications with Laravel, including Livewire and Blade templating.',
                'proficiency' => 6, // 6/10
                'logo' => '/images/skills/laravel.svg',
                'learning_source' => 'Laravel Documentation, Udemy Courses',
                'experience_duration' => '2 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tailwind CSS',
                'description' => 'Experienced in creating responsive and modern UI designs with Tailwind CSS.',
                'proficiency' => 8, // 8/10
                'logo' => '/images/skills/tailwind.svg',
                'learning_source' => 'Tailwind CSS Docs, YouTube Tutorials',
                'experience_duration' => '1.5 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
