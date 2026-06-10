<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::truncate();

        $projects = [
            [
                'title'                => 'Do More Logistics',
                'short_description'    => 'US trucking corporate site with fullscreen video hero, Livewire job application and contact forms with reCAPTCHA, interactive US region maps, and automated email confirmations.',
                'short_description_de' => 'US-Logistikunternehmen-Website mit Video-Hero, Livewire-Formularen mit reCAPTCHA, interaktiven US-Regionskarten und automatischen E-Mail-Bestätigungen.',
                'description'          => 'Corporate website for a US-based trucking and logistics company built with a component-based Blade architecture where every homepage section is a dedicated component (s-entry-welcome-hero, s-why-us, s-services, s-equipment, s-stat-counter, s-testimonials, etc.) assembled in a single welcome.blade.php. The hero renders a full-screen autoplay muted video background (trucks_parking.mp4) with an Alpine.js x-data="heroArrow" component managing a bouncing scroll-down arrow that hides on scroll via transition directives. The headline uses a CSS typing animation, and the CTA uses a custom flip button component — a reusable Blade component with text and hoverText named slots that animates on hover.

Career pages cover three driver programmes — Owner Operator, Lease Purchase, and Equipment — each with a full-page image hero, programme highlights, and a custom interactive US region map SVG component showing coverage areas for both programmes. FAQs are split across four dedicated pages (general, equipment, lease-purchase, owner-operator) using accordion components with Alpine.js expand/collapse state.

Two Livewire forms handle driver recruitment and general enquiries. The job application form captures first name, last name, email, phone, CDL class, and experience fields with wire:model.defer bindings and wire:submit.prevent. Both forms are protected by Google reCAPTCHA via a dedicated recaptcha Blade component and validated server-side. Successful submissions trigger Laravel Mail transactional emails — a confirmation to the applicant and a notification to the admin — using a shared master email layout. A Livewire cookie consent banner handles GDPR compliance.

Additional sections include an animated stat counter, a testimonials slider, a blog preview section, and a social bar component. Light/dark/system theme switching is implemented via a light-dark-mode-dropdown Blade component.',
                'description_de'       => 'Unternehmenswebsite für ein US-amerikanisches Transport- und Logistikunternehmen, entwickelt mit einer komponentenbasierten Blade-Architektur, bei der jeder Bereich der Startseite als dedizierte Komponente in einer einzigen welcome.blade.php zusammengeführt wird. Der Hero rendert einen Vollbild-Video-Hintergrund (trucks_parking.mp4) mit einer Alpine.js-Komponente, die einen animierten Scroll-Pfeil steuert, der beim Scrollen ausblendet. Die Überschrift verwendet eine CSS-Tipp-Animation, der CTA eine benutzerdefinierte Flip-Button-Komponente mit text- und hoverText-Named-Slots.

Die Karriereseiten umfassen drei Fahrerprogramme — Owner Operator, Lease Purchase und Equipment — jeweils mit Vollbild-Hero, Programmhighlights und einer interaktiven US-Regionskarte als SVG-Komponente. FAQs sind auf vier dedizierte Seiten aufgeteilt und verwenden Accordion-Komponenten mit Alpine.js Auf-/Zuklapp-Status.

Zwei Livewire-Formulare verwalten Fahrerrekrutierung und allgemeine Anfragen. Das Bewerbungsformular erfasst Vor- und Nachname, E-Mail, Telefon, CDL-Klasse und Erfahrung mit wire:model.defer-Bindings. Beide Formulare sind durch Google reCAPTCHA geschützt und serverseitig validiert. Erfolgreiche Einsendungen lösen Laravel-Mail-Transaktions-E-Mails aus — eine Bestätigung an den Bewerber und eine Admin-Benachrichtigung. Ein Livewire-Cookie-Consent-Banner übernimmt die DSGVO-Compliance. Weitere Bereiche: animierter Statistikzähler, Testimonials-Slider, Blog-Vorschau und Social-Bar-Komponente.',
                'thumbnail'            => null,
                'demo_url'             => 'https://domorelogisticsllc.com',
                'github_url'           => null,
                'tech_stack'           => ['Laravel', 'Livewire 3', 'Alpine.js', 'Tailwind CSS', 'MySQL', 'reCAPTCHA'],
                'is_featured'          => true,
                'github_is_public'     => false,
                'order'                => 1,
            ],
            [
                'title'                => 'Fragilo',
                'short_description'    => 'German community Q&A platform with Livewire-powered question and answer modals, Quill.js rich text editing, live search overlay, bookmarks, avatar customisation, and an iOS mobile wrapper view layer.',
                'short_description_de' => 'Deutsche Q&A-Community-Plattform mit Livewire-Modals für Fragen und Antworten, Quill.js-Texteditor, Live-Suche, Lesezeichen, Avatar-Anpassung und iOS-Wrapper-Ansichten.',
                'description'          => 'German community Q&A platform built on Laravel with Jetstream authentication (two-factor auth, API tokens, team invitations). The entire frontend is driven by Livewire components: a modal for posting questions, a modal for writing answers, a live search overlay with keyword filtering, a spam-reporting modal, a bookmarks system, and a native ads component. Rich text input for questions and answers uses a Quill.js editor integrated via wire:ignore to prevent Livewire from interfering with the editor\'s DOM.

Question detail pages include a related questions sidebar resolved by tag/topic matching, an Alpine.js image lightbox, and per-page dynamic Open Graph and Twitter Card meta tags for SEO. The discovery layer covers all questions, theme worlds (categories), and tag-based filtered views. Users get a personal dashboard with activity overview, a bookmarks page, and an avatar customisation page with selectable profile images.

Notably, the project includes a dedicated iOS layout and full set of Livewire iOS views (auth, dashboard, question pages) — indicating a mobile app wrapper that consumes the same Laravel backend through a separate view layer. Transactional emails are handled via Laravel Mail (account confirmation, team invitations).',
                'description_de'       => 'Deutsche Community-Q&A-Plattform auf Laravel mit Jetstream-Authentifizierung (Zwei-Faktor-Auth, API-Token, Team-Einladungen). Das gesamte Frontend wird von Livewire-Komponenten gesteuert: ein Modal zum Stellen von Fragen, ein Modal zum Schreiben von Antworten, eine Live-Suchmaske mit Schlüsselwortfilterung, ein Spam-Melde-Modal, ein Lesezeichen-System und eine native Werbeanzeigen-Komponente. Die Texteingabe verwendet einen Quill.js-Editor, integriert über wire:ignore, um Livewire-DOM-Interferenzen zu verhindern.

Fragendetailseiten enthalten eine Sidebar mit verwandten Fragen (aufgelöst durch Tag/Thema-Zuordnung), eine Alpine.js-Bildlightbox und dynamische Open-Graph- und Twitter-Card-Meta-Tags für SEO. Die Entdeckungsebene umfasst alle Fragen, Themenwelten (Kategorien) und tagbasierte Filteransichten. Nutzer erhalten ein persönliches Dashboard mit Aktivitätsübersicht, eine Lesezeichenseite und eine Avatar-Anpassungsseite.

Bemerkenswert ist ein dediziertes iOS-Layout mit vollständigen Livewire-iOS-Ansichten (Auth, Dashboard, Frageseiten) — was auf eine mobile App-Hülle hindeutet, die dasselbe Laravel-Backend über eine separate Ansichtsschicht nutzt. Transaktions-E-Mails werden über Laravel Mail abgewickelt (Kontobestätigung, Team-Einladungen).',
                'thumbnail' => '/images/projects/fragilo.png',
                'demo_url'             => 'https://www.fragilo.de',
                'github_url'           => null,
                'tech_stack'           => ['Laravel', 'Jetstream', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'Quill.js', 'MySQL'],
                'is_featured'          => true,
                'github_is_public'     => false,
                'order'                => 2,
            ],
            [
                'title'                => 'Personal Portfolio',
                'short_description'    => 'Personal developer portfolio with multilingual EN/DE support, zero-flash theme switching, 3D skills sphere, animated stat counters, and service modals via JSON API. Auto-deployed via GitHub webhook.',
                'short_description_de' => 'Persönliches Entwickler-Portfolio mit EN/DE-Unterstützung, blitzschneller Theme-Umschaltung, 3D-Skills-Kugel, animierten Statistiken und Service-Modals via JSON-API. Automatisch via GitHub-Webhook deployt.',
                'description'          => 'Personal developer portfolio built from scratch on Laravel 12 with Livewire 3. Implements a URL-based multilingual system (EN/DE) via custom SetLocaleFromUrl middleware. Theme switching (light/dark/system) uses a synchronous head script that sets a data-theme attribute on <html> before render — eliminating flash of wrong theme — with CSS-driven icon rendering and Alpine.js managing interactive state changes.

The hero section features a typewriter effect cycling through tech stack roles and an IntersectionObserver-triggered animated stat counter with cubic easing. The services section loads data from MySQL via Eloquent and opens locale-aware detail modals through a dedicated ServiceApiController JSON endpoint. Skills are displayed in a pure JavaScript 3D rotating sphere using devicons CDN for technology logos alongside animated SVG progress rings powered by CSS @property and conic-gradient.

The component library includes reusable Blade components: page-section, page-header, section-header, primary-button (5 variants: default, sm, gradient, amber, white), ghost-button, nav-link (with dynamic prop for Alpine.js hash-based active states), about-card (named icon slot + title), timeline-item, progress-bar, and sidebar-card. The testimonials section uses a Swiper.js carousel seeded from DB with initials-gradient avatar fallback. Toast notifications use devrabiul/laravel-toaster-magic. Scroll-reveal animations use a MutationObserver rescue function to handle Livewire DOM morphing. Auto-deployed to Netcup shared hosting via GitHub webhook triggering a bash deploy script.',
                'description_de'       => 'Persönliches Entwickler-Portfolio von Grund auf mit Laravel 12 und Livewire 3 entwickelt. Implementiert ein URL-basiertes Mehrsprachensystem (EN/DE) über eine benutzerdefinierte SetLocaleFromUrl-Middleware. Die Theme-Umschaltung (Hell/Dunkel/System) verwendet ein synchrones Head-Skript, das ein data-theme-Attribut auf <html> vor dem Rendern setzt — wodurch ein Aufblitzen des falschen Themes verhindert wird — mit CSS-gesteuerter Icon-Darstellung und Alpine.js zur Verwaltung interaktiver Statusänderungen.

Der Hero-Bereich enthält einen Schreibmaschineneffekt mit Tech-Stack-Rollen und einen IntersectionObserver-gesteuerten animierten Statistikzähler mit kubischer Easing-Funktion. Der Servicebereich lädt Daten aus MySQL über Eloquent und öffnet lokalisierte Detailmodals über einen dedizierten ServiceApiController-JSON-Endpunkt. Skills werden in einer reinen JavaScript-3D-Rotationskugel mit devicons CDN sowie animierten SVG-Fortschrittsringen basierend auf CSS @property und conic-gradient dargestellt.

Die Komponentenbibliothek umfasst wiederverwendbare Blade-Komponenten: page-section, page-header, section-header, primary-button (5 Varianten), ghost-button, nav-link (mit dynamic-Prop für Alpine.js hash-basierte Aktivzustände), about-card, timeline-item, progress-bar und sidebar-card. Der Testimonials-Bereich verwendet ein Swiper.js-Karussell aus der Datenbank mit Initialen-Gradient-Avatar-Fallback. Scroll-Reveal-Animationen nutzen eine MutationObserver-Rettungsfunktion für Livewire-DOM-Morphing. Automatisch auf Netcup Shared Hosting via GitHub-Webhook deployt.',
                'thumbnail' => '/images/projects/portfolio.png',
                'demo_url'             => 'https://darkocekovski.com',
                'github_url'           => 'https://github.com/darkoCekovski/portfolio-darko-cekovski',
                'tech_stack'           => ['Laravel 12', 'Livewire 3', 'Alpine.js', 'Tailwind CSS', 'MySQL', 'Vite', 'Swiper.js'],
                'is_featured'          => true,
                'github_is_public'     => true,
                'order'                => 3,
            ],
            [
                'title'                => 'ImmoTech',
                'short_description'    => 'Full-stack real estate platform with advanced property search, Swiper gallery with lightbox, 3-role permission system, Livewire CRUD forms, favourites, visit scheduling, and 9 languages across 3 themes.',
                'short_description_de' => 'Immobilien-Plattform mit erweiterter Suche, Swiper-Galerie mit Lightbox, 3-Rollen-System, Livewire-CRUD-Formularen, Favoriten, Besichtigungsplanung und 9 Sprachen in 3 Themes.',
                'description'          => 'Full-stack real estate listing platform built with Laravel 11 and Livewire 3. The homepage opens with a full-viewport hero Swiper carousel of featured properties — each slide is a fully clickable link with an overlay chip showing price, listing type badge (For Sale / For Rent / Purchase Request), bedroom count and surface area. Below it sits an advanced search panel driven by Alpine.js tab switching across three listing types, with 9+ filter fields (city, country, price range, bedrooms, surface area, property type) submitted via GET parameters.

Property detail pages render a dual Swiper gallery — a main slider and a thumbnail strip — with an Alpine.js lightbox supporting keyboard navigation (arrow keys, Escape). Each detail page includes an owner management banner (edit, delete with confirmation) visible only to the listing owner or admin, a breadcrumb trail resolving to city and slug, and a live views counter per property. The inquiry form and free valuation tool are Livewire components that submit without page reload. An $isOwner PHP check controls the edit/delete UI entirely server-side.

The 3-role permission system (Admin / Agent / User) is enforced via canManageListings() checks throughout the UI. The user dashboard displays four metric cards — active listings, unread inquiries, upcoming visits, saved favourites — each resolved by Eloquent relationships at render time. The favourites system and visit scheduling are fully authenticated features. Property slugs follow the pattern {id}-{slug} and resolve via a dedicated properties.show route.

Nine languages (EN, DE, MK, RS, BG, HR, SI, GR, AL) are implemented via a gl() locale helper. Three themes (light/dark/system) use zero-flash switching. Swiper.js powers hero, gallery, thumbnail and mobile carousels throughout. The database is seeded with 90+ factory-generated properties using Unsplash image URLs.',
                'description_de'       => 'Vollständige Immobilien-Listing-Plattform mit Laravel 11 und Livewire 3. Die Startseite öffnet sich mit einem Vollbild-Hero-Swiper-Karussell mit Immobilien-Highlights — jede Folie zeigt Preis, Listing-Typ-Badge (Zu verkaufen / Zu vermieten / Kaufanfragen), Schlafzimmeranzahl und Grundfläche. Darunter ein erweitertes Suchpanel mit Alpine.js-Tab-Wechsel über drei Listing-Typen und 9+ Filterfeldern per GET-Parametern.

Immobiliendetailseiten rendern eine duale Swiper-Galerie — Hauptschieber und Thumbnail-Streifen — mit Alpine.js-Lightbox und Tastaturnavigation (Pfeiltasten, Escape). Jede Seite enthält ein Eigentümer-Verwaltungsbanner (Bearbeiten, Löschen mit Bestätigung), einen Breadcrumb-Pfad und einen Live-Aufrufzähler. Anfrage-Formular und kostenloses Bewertungstool sind Livewire-Komponenten ohne Seitenreload. Das 3-Rollen-System (Admin / Agent / Nutzer) wird über canManageListings()-Prüfungen durchgesetzt. Das Dashboard zeigt vier Metrikkarten: aktive Inserate, ungelesene Anfragen, Besichtigungen und Favoriten.

Neun Sprachen (EN, DE, MK, RS, BG, HR, SI, GR, AL) über gl()-Locale-Helfer. Drei Themes mit blitzschneller Umschaltung ohne Aufblitzen. Swiper.js betreibt Hero-, Galerie-, Thumbnail- und Mobile-Karussells. Die Datenbank enthält 90+ fabrikgenerierte Immobilien mit Unsplash-Bild-URLs.',
                'thumbnail'            => null,
                'demo_url'             => null,
                'github_url'           => 'https://github.com/darkoCekovski/immotech',
                'tech_stack'           => ['Laravel 11', 'Livewire 3', 'Alpine.js', 'Tailwind CSS', 'Swiper.js', 'MySQL', 'Vite'],
                'is_featured'          => true,
                'github_is_public'     => true,
                'order'                => 4,
            ],
            [
                'title'                => 'AsiaFlirt',
                'short_description'    => 'International dating platform (EN/DE/FR) with real-time Livewire chat, admin-moderated photo uploads, ID verification, trip planning with Swiper galleries, multilingual stories, membership tiers, and a Filament admin panel.',
                'short_description_de' => 'Internationale Dating-Plattform (EN/DE/FR) mit Echtzeit-Livewire-Chat, adminmoderiertem Foto-Upload, ID-Verifizierung, Reiseplanung mit Swiper-Galerien, mehrsprachigen Stories und Filament-Admin-Panel.',
                'description'          => 'International dating and social platform connecting European and Asian users through live video, profile browsing, trip planning, and community stories. Built on Laravel with Jetstream (2FA, OTP email verification, phone verification via Livewire). New users go through an Alpine.js multi-step onboarding wizard with live progress tracking before accessing the platform.

Profiles include preference settings, birthday-based age calculation, photo uploads via the livewire-media-library package with admin approval moderation (photos render blurred until approved). Identity verification uses an ID check upload flow with a dedicated Filament admin table column for approve/deny decisions. The Filament admin panel includes a custom widget tracking Tinify API image compression usage and remaining monthly quota.

The chat system is fully Livewire-driven with a three-pane layout (user list, message board, write message) and block/unblock functionality. Stories support multilingual content via getTranslation(\'heading\', gl()), likes, and multi-image galleries. The Trips feature lets users post and join travel plans with Swiper thumbnail galleries, admin-approved media, and like/join Livewire interactions. A membership/subscription page offers tiered plans. Unauthenticated visitors see a teaser modal component. Transactional emails cover welcome with credentials, OTP, newsletter, ID check approval, issue reports, and contact forms. Three languages: EN, DE, FR via gl() locale helper with hreflang SEO links.',
                'description_de'       => 'Internationale Dating- und Social-Plattform, die europäische und asiatische Nutzer durch Live-Video, Profilsuche, Reiseplanung und Community-Stories verbindet. Entwickelt mit Laravel und Jetstream (2FA, OTP-E-Mail-Verifizierung, Telefon-Verifizierung via Livewire). Neue Nutzer durchlaufen einen Alpine.js-mehrstufigen Onboarding-Assistenten mit Live-Fortschrittsverfolgung vor dem Plattformzugang.

Profile umfassen Präferenzeinstellungen, geburtstagbasierte Altersberechnung und Foto-Uploads über das livewire-media-library-Paket mit Admin-Genehmigungsmoderation (Fotos erscheinen unscharf bis zur Genehmigung). Die ID-Verifizierung verwendet einen Upload-Ablauf mit einer dedizierten Filament-Admin-Tabellenspalte. Das Filament-Admin-Panel enthält ein benutzerdefiniertes Widget zur Tinify-API-Bildkomprimierungsverfolgung.

Das Chat-System ist vollständig Livewire-gesteuert mit einem Drei-Bereiche-Layout (Nutzerliste, Nachrichtenboard, Nachricht schreiben) und Block-/Entsperrfunktionalität. Stories unterstützen mehrsprachige Inhalte via getTranslation(), Likes und Mehr-Bild-Galerien. Die Trips-Funktion ermöglicht Reisepläne mit Swiper-Galerien und admin-genehmigten Medien. Drei Sprachen: EN, DE, FR via gl()-Locale-Helfer mit hreflang-SEO-Links.',
                'thumbnail' => '/images/projects/asiaflirt.png',
                'demo_url'             => 'https://www.asiaflirt.com',
                'github_url'           => null,
                'tech_stack'           => ['Laravel', 'Jetstream', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'Filament', 'Swiper.js', 'MySQL', 'Tinify API'],
                'is_featured'          => false,
                'github_is_public'     => false,
                'order'                => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
