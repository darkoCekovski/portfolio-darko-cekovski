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
                    'de' => 'Web-App-Entwicklung',
                ],
                'description' => [
                    'en' => 'I build complete Laravel web applications from the ground up — clean code, solid structure, and intuitive interfaces. From business tools to multi-user platforms, using Laravel, Livewire, and modern frontend techniques.',
                    'de' => 'Ich entwickle vollständige Laravel-Webanwendungen von Grund auf — sauberer Code, solide Struktur und intuitive Benutzeroberflächen. Von Business-Tools bis hin zu Mehrbenutzer-Plattformen, mit Laravel, Livewire und modernen Frontend-Techniken.',
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
                    'en' => 'Clean, responsive interfaces that look great on every screen. I build component-based layouts with Tailwind CSS and Alpine.js — smooth interactions, accessible markup, and consistent styling that users enjoy.',
                    'de' => 'Saubere, responsive Benutzeroberflächen, die auf jedem Bildschirm überzeugen. Ich erstelle komponentenbasierte Layouts mit Tailwind CSS und Alpine.js — flüssige Interaktionen, barrierefreies Markup und konsistentes Styling.',
                ],
            ],
            [
                'name' => 'laravel-backend',
                'icon' => 'M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 2.625c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125m16.5 5.625c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125',
                'title' => [
                    'en' => 'Laravel Backend & API',
                    'de' => 'Laravel Backend & API',
                ],
                'description' => [
                    'en' => 'Reliable server-side foundations with Laravel — RESTful APIs, MySQL database design, Eloquent ORM, and authentication systems. Clean, well-organised PHP code your team can understand and build on.',
                    'de' => 'Zuverlässige serverseitige Grundlagen mit Laravel — RESTful APIs, MySQL-Datenbankdesign, Eloquent ORM und Authentifizierungssysteme. Sauberer, gut strukturierter PHP-Code, den dein Team verstehen und weiterentwickeln kann.',
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
                    'en' => 'Faster pages keep users engaged. I review and improve frontend load times, optimise images and assets, clean up inefficient database queries, and apply Tailwind CSS best practices — so your application feels quick and responsive.',
                    'de' => 'Schnellere Seiten halten Nutzer bei der Stange. Ich überprüfe und verbessere Frontend-Ladezeiten, optimiere Bilder und Assets, bereinige ineffiziente Datenbankabfragen und wende Tailwind-CSS-Best-Practices an.',
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
                    'en' => 'Keep your application healthy after launch. I handle bug fixes, dependency updates, security patches, and incremental feature additions — so you can focus on your business while your app stays up to date.',
                    'de' => 'Deine Anwendung nach dem Launch gesund halten. Ich kümmere mich um Bugfixes, Dependency-Updates, Sicherheits-Patches und schrittweise Feature-Ergänzungen — damit du dich auf dein Business konzentrieren kannst.',
                ],
            ],
            [
                'name' => 'localisation-theming',
                'icon' => 'M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802',
                'title' => [
                    'en' => 'Localisation & Theming',
                    'de' => 'Lokalisierung & Theming',
                ],
                'description' => [
                    'en' => 'Reach every user in their preferred language and theme. I implement locale-based routing, smooth language switching, and zero-flash light/dark/system theme detection — delivering Laravel applications that feel native to every visitor.',
                    'de' => 'Erreiche jeden Nutzer in seiner bevorzugten Sprache und mit seinem bevorzugten Theme. Ich implementiere locale-basiertes Routing, flüssige Sprachumschaltung und blitzschnelle Hell-/Dunkel-/System-Theme-Erkennung — für Laravel-Anwendungen, die sich jedem Besucher nativ anfühlen.',
                ],
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
