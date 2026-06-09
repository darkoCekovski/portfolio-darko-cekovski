<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    public function run(): void
    {
        Skill::truncate();

        $skills = [
            [
                'name'                => 'HTML',
                'description'         => 'Strong foundation in semantic HTML5 markup, accessibility best practices, and structured document design.',
                'proficiency'         => 9,
                'logo'                => '/images/skills/html.svg',
                'learning_source'     => 'MDN Web Docs, freeCodeCamp',
                'experience_duration' => '6 years',
            ],
            [
                'name'                => 'CSS',
                'description'         => 'Proficient in modern CSS including Flexbox, Grid, animations, and responsive design patterns.',
                'proficiency'         => 8,
                'logo'                => '/images/skills/css.svg',
                'learning_source'     => 'MDN Web Docs, CSS Tricks',
                'experience_duration' => '6 years',
            ],
            [
                'name'                => 'Tailwind CSS',
                'description'         => 'Experienced in building responsive, modern UIs rapidly using Tailwind CSS utility classes.',
                'proficiency'         => 8,
                'logo'                => '/images/skills/tailwind.svg',
                'learning_source'     => 'Tailwind CSS Docs, YouTube Tutorials',
                'experience_duration' => '2 years',
            ],
            [
                'name'                => 'JavaScript',
                'description'         => 'Skilled in creating dynamic and interactive features, DOM manipulation, and async patterns.',
                'proficiency'         => 7,
                'logo'                => '/images/skills/javascript.svg',
                'learning_source'     => 'MDN Web Docs, freeCodeCamp',
                'experience_duration' => '3 years',
            ],
            [
                'name'                => 'jQuery',
                'description'         => 'Experienced with jQuery for DOM manipulation, AJAX requests, and legacy project maintenance.',
                'proficiency'         => 7,
                'logo'                => '/images/skills/jquery.svg',
                'learning_source'     => 'jQuery Docs, Udemy Courses',
                'experience_duration' => '5 years',
            ],
            [
                'name'                => 'Alpine.js',
                'description'         => 'Proficient in Alpine.js for lightweight reactivity and UI interactivity within Blade templates.',
                'proficiency'         => 8,
                'logo'                => '/images/skills/alpinejs.svg',
                'learning_source'     => 'Alpine.js Docs, Laracasts',
                'experience_duration' => '2 years',
            ],
            [
                'name'                => 'Vue.js',
                'description'         => 'Familiar with Vue.js fundamentals, component-based architecture, and reactive data binding.',
                'proficiency'         => 3,
                'logo'                => '/images/skills/vue.svg',
                'learning_source'     => 'Vue.js Docs, Udemy Courses',
                'experience_duration' => '1 year',
            ],
            [
                'name'                => 'React',
                'description'         => 'Basic understanding of React components, hooks, and state management fundamentals.',
                'proficiency'         => 3,
                'logo'                => '/images/skills/react.svg',
                'learning_source'     => 'React Docs, freeCodeCamp',
                'experience_duration' => '0.5 years',
            ],
            [
                'name'                => 'PHP',
                'description'         => 'Solid understanding of PHP fundamentals, OOP principles, and server-side scripting.',
                'proficiency'         => 6,
                'logo'                => '/images/skills/php.svg',
                'learning_source'     => 'PHP Docs, Laracasts',
                'experience_duration' => '2 years',
            ],
            [
                'name'                => 'Laravel',
                'description'         => 'Proficient in building web applications with Laravel including routing, Eloquent ORM, queues, and API development.',
                'proficiency'         => 7,
                'logo'                => '/images/skills/laravel.svg',
                'learning_source'     => 'Laravel Docs, Laracasts',
                'experience_duration' => '2 years',
            ],
            [
                'name'                => 'Livewire',
                'description'         => 'Proficient in building reactive full-stack interfaces with Laravel Livewire 3.',
                'proficiency'         => 7,
                'logo'                => '/images/skills/livewire.svg',
                'learning_source'     => 'Livewire Docs, Laracasts',
                'experience_duration' => '1 year',
            ],
            [
                'name'                => 'MySQL',
                'description'         => 'Experienced in relational database design, writing queries, and optimising performance.',
                'proficiency'         => 6,
                'logo'                => '/images/skills/mysql.svg',
                'learning_source'     => 'MySQL Docs, Laracasts',
                'experience_duration' => '2 years',
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
