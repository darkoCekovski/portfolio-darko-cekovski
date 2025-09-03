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
                'title' => [
                    'en' => 'Frontend Development',
                    'de' => 'Frontend-Entwicklung',
                ],
                'description' => [
                    'en' => 'Building user-friendly, visually appealing interfaces with Tailwind CSS and JavaScript.',
                    'de' => 'Erstellung benutzerfreundlicher, optisch ansprechender Oberflächen mit Tailwind CSS und JavaScript.',
                ],
                'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01',
            ],
            [
                'title' => [
                    'en' => 'Backend Development',
                    'de' => 'Backend-Entwicklung',
                ],
                'description' => [
                    'en' => 'Developing robust APIs and server-side logic with Laravel and MySQL.',
                    'de' => 'Entwicklung robuster APIs und serverseitiger Logik mit Laravel und MySQL.',
                ],
                'icon' => 'M5 11l7-7 7 7M5 19l7-7 7 7',
            ],
            [
                'title' => [
                    'en' => 'Responsive Design',
                    'de' => 'Responsives Design',
                ],
                'description' => [
                    'en' => 'Ensuring websites work seamlessly across all devices using Tailwind CSS.',
                    'de' => 'Sicherstellung, dass Websites auf allen Geräten mit Tailwind CSS nahtlos funktionieren.',
                ],
                'icon' => 'M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z',
            ],
            [
                'title' => [
                    'en' => 'SEO',
                    'de' => 'SEO',
                ],
                'description' => [
                    'en' => 'Optimizing websites for search engines to improve visibility and rankings.',
                    'de' => 'Optimierung von Websites für Suchmaschinen, um Sichtbarkeit und Rankings zu verbessern.',
                ],
                'icon' => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
            ],
            [
                'title' => [
                    'en' => 'Custom Web Solutions',
                    'de' => 'Individuelle Web-Lösungen',
                ],
                'description' => [
                    'en' => 'Developing tailored solutions like portfolios, e-commerce platforms, or CMS.',
                    'de' => 'Entwicklung maßgeschneiderter Lösungen wie Portfolios, E-Commerce-Plattformen oder CMS.',
                ],
                'icon' => 'M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z M13.5 10.5H21A10.5 10.5 0 0110.5 0v7.5z',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
