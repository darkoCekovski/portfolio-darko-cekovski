<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('skills')->truncate(); // Clear table to avoid duplicates
        DB::table('skills')->insert([
            [
                'name' => 'HTML',
                'description' => 'Proficient in building web applications with Laravel, including Livewire and Blade templating.',
                'proficiency' => 9,
                'logo' => '/images/skills/html.svg',
                'learning_source' => 'Laravel Documentation, Udemy Courses',
                'experience_duration' => '6 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CSS',
                'description' => 'Proficient in building web applications with Laravel, including Livewire and Blade templating.',
                'proficiency' => 8,
                'logo' => '/images/skills/css.svg',
                'learning_source' => 'Laravel Documentation, Udemy Courses',
                'experience_duration' => '6 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tailwind CSS',
                'description' => 'Experienced in creating responsive and modern UI designs with Tailwind CSS.',
                'proficiency' => 8,
                'logo' => '/images/skills/tailwind.svg',
                'learning_source' => 'Tailwind CSS Docs, YouTube Tutorials',
                'experience_duration' => '1.5 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'JavaScript',
                'description' => 'Skilled in creating dynamic, interactive features with raw JavaScript.',
                'proficiency' => 7,
                'logo' => '/images/skills/javascript.svg',
                'learning_source' => 'MDN Web Docs, FreeCodeCamp',
                'experience_duration' => '3 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'jQuery',
                'description' => 'Proficient in building web applications with Laravel, including Livewire and Blade templating.',
                'proficiency' => 7,
                'logo' => '/images/skills/jquery.svg',
                'learning_source' => 'Laravel Documentation, Udemy Courses',
                'experience_duration' => '5 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vue js',
                'description' => 'Proficient in building web applications with Laravel, including Livewire and Blade templating.',
                'proficiency' => 3,
                'logo' => '/images/skills/vue.svg',
                'learning_source' => 'Laravel Documentation, Udemy Courses',
                'experience_duration' => '1 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'React',
                'description' => 'Proficient in building web applications with Laravel, including Livewire and Blade templating.',
                'proficiency' => 3,
                'logo' => '/images/skills/react.svg',
                'learning_source' => 'Laravel Documentation, Udemy Courses',
                'experience_duration' => '0.5 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PHP',
                'description' => 'Proficient in building web applications with Laravel, including Livewire and Blade templating.',
                'proficiency' => 3,
                'logo' => '/images/skills/php.svg',
                'learning_source' => 'Laravel Documentation, Udemy Courses',
                'experience_duration' => '1 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laravel',
                'description' => 'Proficient in building web applications with Laravel, including Livewire and Blade templating.',
                'proficiency' => 4,
                'logo' => '/images/skills/laravel.svg',
                'learning_source' => 'Laravel Documentation, Udemy Courses',
                'experience_duration' => '2 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Livewire',
                'description' => 'Proficient in building reactive interfaces with Laravel Livewire.',
                'proficiency' => 4,
                'logo' => '/images/skills/livewire.svg',
                'learning_source' => 'Livewire Docs, Laracasts',
                'experience_duration' => '1 year',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mySQL',
                'description' => 'Proficient in building reactive interfaces with Laravel Livewire.',
                'proficiency' => 6,
                'logo' => '/images/skills/mysql.svg',
                'learning_source' => 'Livewire Docs, Laracasts',
                'experience_duration' => '1 year',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
