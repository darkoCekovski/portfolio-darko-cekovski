<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::truncate();

        $services = [
            [
                'name' => 'web-application-development',
                'icon' => 'M6.75 7.5l3 2.25-3 2.25m4.5 0h3M5.25 21H18.75a2.25 2.25 0 0 0 2.25-2.25V5.25A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25v13.5A2.25 2.25 0 0 0 5.25 21z',
                'title' => [
                    'en' => 'Web Application Development',
                    'de' => 'Webanwendungsentwicklung',
                ],
                'description' => [
                    'en' => 'I build full-stack web applications from the ground up — clean architecture, fast performance, and intuitive UX. From simple business tools to complex multi-user platforms, using Laravel, Livewire, and modern frontend techniques.',
                    'de' => 'Ich entwickle Full-Stack-Webanwendungen von Grund auf — saubere Architektur, schnelle Performance und intuitive UX. Von einfachen Business-Tools bis hin zu komplexen Mehrbenutzer-Plattformen, mit Laravel, Livewire und modernen Frontend-Techniken.',
                ],
            ],
            [
                'name' => 'responsive-ui-design',
                'icon' => 'M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0H3',
                'title' => [
                    'en' => 'Responsive UI & Frontend',
                    'de' => 'Responsives UI & Frontend',
                ],
                'description' => [
                    'en' => 'Pixel-perfect interfaces that look great on every screen. I craft responsive layouts with Tailwind CSS and Alpine.js — smooth animations, accessible components, and consistent design systems that users actually enjoy.',
                    'de' => 'Pixelgenaue Interfaces, die auf jedem Bildschirm gut aussehen. Ich gestalte responsive Layouts mit Tailwind CSS und Alpine.js — flüssige Animationen, barrierefreie Komponenten und konsistente Designsysteme.',
                ],
            ],
            [
                'name' => 'laravel-backend',
                'icon' => 'M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 6 0m-6 0H3m16.5 0a3 3 0 0 0 3-3m-3 3a3 3 0 1 1-6 0m6 0h1.5m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.065M17.ordinance744 17.785l-1.15-.065M8.25 9h7.5M8.25 6.75h7.5',
                'icon' => 'M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 2.625c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125m16.5 5.625c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125',
                'title' => [
                    'en' => 'Laravel Backend & API',
                    'de' => 'Laravel Backend & API',
                ],
                'description' => [
                    'en' => 'Solid server-side foundations using Laravel — RESTful APIs, database design with MySQL, authentication, queues, and scheduled tasks. Clean, maintainable code that scales as your project grows.',
                    'de' => 'Solide serverseitige Grundlagen mit Laravel — RESTful APIs, Datenbankdesign mit MySQL, Authentifizierung, Queues und geplante Tasks. Sauberer, wartbarer Code, der mit deinem Projekt skaliert.',
                ],
            ],
            [
                'name' => 'performance-optimisation',
                'icon' => 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z',
                'title' => [
                    'en' => 'Performance Optimisation',
                    'de' => 'Performance-Optimierung',
                ],
                'description' => [
                    'en' => 'Slow websites lose users. I analyse and optimise loading speed, database queries, caching strategies, and asset delivery — so your app feels instant and keeps visitors engaged.',
                    'de' => 'Langsame Websites verlieren Nutzer. Ich analysiere und optimiere Ladegeschwindigkeit, Datenbankabfragen, Caching-Strategien und Asset-Auslieferung — damit sich deine App blitzschnell anfühlt.',
                ],
            ],
            [
                'name' => 'maintenance-support',
                'icon' => 'M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z',
                'title' => [
                    'en' => 'Maintenance & Support',
                    'de' => 'Wartung & Support',
                ],
                'description' => [
                    'en' => 'Keeping your application healthy after launch. I handle bug fixes, dependency updates, security patches, and feature additions — so you can focus on your business while your tech stays up to date.',
                    'de' => 'Deine Anwendung nach dem Launch am Laufen halten. Ich kümmere mich um Bugfixes, Dependency-Updates, Sicherheits-Patches und neue Features — damit du dich auf dein Business konzentrieren kannst.',
                ],
            ],
            [
                'name' => 'consulting',
                'icon' => 'M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155',
                'title' => [
                    'en' => 'Technical Consulting',
                    'de' => 'Technische Beratung',
                ],
                'description' => [
                    'en' => 'Not sure which tech stack to choose, or how to structure your next project? I offer honest, practical advice on architecture, tooling, and development approach — helping you avoid costly mistakes early.',
                    'de' => 'Nicht sicher, welchen Tech-Stack du wählen oder wie du dein nächstes Projekt strukturieren sollst? Ich biete ehrliche, praxisnahe Beratung zu Architektur, Tools und Entwicklungsansatz.',
                ],
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
