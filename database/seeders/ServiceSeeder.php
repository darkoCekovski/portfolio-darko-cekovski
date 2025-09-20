<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'frontend',
                'icon' => 'M4 8L8 12M8 12L12 8M8 12L12 16M8 12L4 16M20 4H4V20',
                'title' => [
                    'en' => 'Frontend Development',
                    'de' => 'Frontend-Entwicklung',
                ],
                'description' => [
                    'en' => 'Building responsive and interactive user interfaces using HTML, CSS, JavaScript, and frameworks like React and Vue.js.',
                    'de' => 'Erstellung responsiver und interaktiver Benutzeroberflächen mit HTML, CSS, JavaScript und Frameworks wie React und Vue.js.',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'backend',
                'icon' => 'M8 4H16V8H20V16H16V20H8V16H4V8H8V4ZM12 16H16V12H12V16ZM12 8H8V12H12V8Z',
                'title' => [
                    'en' => 'Backend Development',
                    'de' => 'Backend-Entwicklung',
                ],
                'description' => [
                    'en' => 'Developing robust server-side applications with PHP, Laravel, and MySQL for seamless functionality.',
                    'de' => 'Entwicklung robuster serverseitiger Anwendungen mit PHP, Laravel und MySQL für nahtlose Funktionalität.',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'responsive-design',
                'icon' => 'M4 4H20V8H4V4ZM4 12H20V16H4V12ZM4 20H20V24H4V20Z',
                'title' => [
                    'en' => 'Responsive Design',
                    'de' => 'Responsives Design',
                ],
                'description' => [
                    'en' => 'Creating websites that adapt seamlessly to various devices and screen sizes using modern CSS techniques.',
                    'de' => 'Erstellung von Websites, die sich mit modernen CSS-Techniken nahtlos an verschiedene Geräte und Bildschirmgrößen anpassen.',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'seo',
                'icon' => 'M4 4H20V8H4V4ZM4 12H20V16H4V12ZM4 20H20',
                'title' => [
                    'en' => 'SEO Optimization',
                    'de' => 'SEO-Optimierung',
                ],
                'description' => [
                    'en' => 'Optimizing websites for search engines to improve visibility and rankings.',
                    'de' => 'Optimierung von Websites für Suchmaschinen zur Verbesserung der Sichtbarkeit und Rankings.',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'custom-web-solution',
                'icon' => 'M4 4H20V20H4V4ZM8 8H16V16H8V8Z',
                'title' => [
                    'en' => 'Custom Web Solution',
                    'de' => 'Individuelle Web-Lösungen',
                ],
                'description' => [
                    'en' => 'Developing tailored web solutions to meet unique business needs using a variety of technologies.',
                    'de' => 'Entwicklung maßgeschneiderter Web-Lösungen, um spezifische Geschäftsanforderungen mit verschiedenen Technologien zu erfüllen.',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
