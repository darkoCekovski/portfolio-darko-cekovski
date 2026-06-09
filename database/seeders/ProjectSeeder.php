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
                'title'             => 'DoMore Logistics',
                'short_description' => 'Corporate website for a US trucking company with a fullscreen video hero, Livewire job application and contact forms with reCAPTCHA, interactive US region maps, and automated email confirmations.',
                'description'       => 'Corporate website for a US-based trucking and logistics company built with a component-based Blade architecture where every homepage section is a dedicated component (s-entry-welcome-hero, s-why-us, s-services, s-equipment, s-stat-counter, s-testimonials, etc.) assembled in a single welcome.blade.php. The hero renders a full-screen autoplay muted video background (trucks_parking.mp4) with an Alpine.js x-data="heroArrow" component managing a bouncing scroll-down arrow that hides on scroll via transition directives. The headline uses a CSS typing animation, and the CTA uses a custom flip button component — a reusable Blade component with text and hoverText named slots that animates on hover.

Career pages cover three driver programmes — Owner Operator, Lease Purchase, and Equipment — each with a full-page image hero, programme highlights, and a custom interactive US region map SVG component showing coverage areas for both programmes. FAQs are split across four dedicated pages (general, equipment, lease-purchase, owner-operator) using accordion components with Alpine.js expand/collapse state.

Two Livewire forms handle driver recruitment and general enquiries. The job application form captures first name, last name, email, phone, CDL class, and experience fields with wire:model.defer bindings and wire:submit.prevent. Both forms are protected by Google reCAPTCHA via a dedicated recaptcha Blade component and validated server-side. Successful submissions trigger Laravel Mail transactional emails — a confirmation to the applicant and a notification to the admin — using a shared master email layout. A Livewire cookie consent banner handles GDPR compliance.

Additional sections include an animated stat counter, a testimonials slider, a blog preview section, and a social bar component. Light/dark/system theme switching is implemented via a light-dark-mode-dropdown Blade component.',
                'thumbnail'         => null,
                'demo_url'          => 'https://domorelogisticsllc.com',
                'github_url'        => null,
                'tech_stack'        => ['Laravel', 'Livewire 3', 'Alpine.js', 'Tailwind CSS', 'MySQL', 'reCAPTCHA'],
                'is_featured'       => true,
                'github_is_public'  => false,
                'order'             => 1,
            ],
            [
                'title'             => 'Fragilo',
                'short_description' => 'German community Q&A platform with Livewire-powered question and answer modals, Quill.js rich text editing, live search overlay, bookmarks, avatar customisation, and an iOS mobile wrapper view layer.',
                'description'       => 'German community Q&A platform built on Laravel with Jetstream authentication (two-factor auth, API tokens, team invitations). The entire frontend is driven by Livewire components: a modal for posting questions, a modal for writing answers, a live search overlay with keyword filtering, a spam-reporting modal, a bookmarks system, and a native ads component. Rich text input for questions and answers uses a Quill.js editor integrated via wire:ignore to prevent Livewire from interfering with the editor\'s DOM.

Question detail pages include a related questions sidebar resolved by tag/topic matching, an Alpine.js image lightbox, and per-page dynamic Open Graph and Twitter Card meta tags for SEO. The discovery layer covers all questions, theme worlds (categories), and tag-based filtered views. Users get a personal dashboard with activity overview, a bookmarks page, and an avatar customisation page with selectable profile images.

Notably, the project includes a dedicated iOS layout and full set of Livewire iOS views (auth, dashboard, question pages) — indicating a mobile app wrapper that consumes the same Laravel backend through a separate view layer. Transactional emails are handled via Laravel Mail (account confirmation, team invitations).',
                'thumbnail'         => null,
                'demo_url'          => 'https://www.fragilo.de',
                'github_url'        => null,
                'tech_stack'        => ['Laravel', 'Jetstream', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'Quill.js', 'MySQL'],
                'is_featured'       => true,
                'github_is_public'  => false,
                'order'             => 2,
            ],
            [
                'title'             => 'Personal Portfolio',
                'short_description' => 'Personal developer portfolio with multilingual EN/DE support, zero-flash theme switching, 3D skills sphere, animated stat counters, and service modals via JSON API. Auto-deployed via GitHub webhook.',
                'description'       => 'Personal developer portfolio built from scratch on Laravel 12 with Livewire 3. Implements a URL-based multilingual system (EN/DE) via custom SetLocaleFromUrl middleware. Theme switching (light/dark/system) uses a synchronous head script that sets a data-theme attribute on <html> before render — eliminating flash of wrong theme — with CSS-driven icon rendering and Alpine.js managing interactive state changes.

The hero section features a typewriter effect cycling through tech stack roles and an IntersectionObserver-triggered animated stat counter with cubic easing. The services section loads data from MySQL via Eloquent and opens locale-aware detail modals through a dedicated ServiceApiController JSON endpoint. Skills are displayed in a pure JavaScript 3D rotating sphere using devicons CDN for technology logos alongside animated SVG progress rings powered by CSS @property and conic-gradient.

The component library includes reusable Blade components: page-section, page-header, section-header, primary-button (5 variants: default, sm, gradient, amber, white), ghost-button, nav-link (with dynamic prop for Alpine.js hash-based active states), about-card (named icon slot + title), timeline-item, progress-bar, and sidebar-card. The testimonials section uses a Swiper.js carousel seeded from DB with initials-gradient avatar fallback. Toast notifications use devrabiul/laravel-toaster-magic. Scroll-reveal animations use a MutationObserver rescue function to handle Livewire DOM morphing. Auto-deployed to Netcup shared hosting via GitHub webhook triggering a bash deploy script.',
                'thumbnail'         => null,
                'demo_url'          => 'https://darkocekovski.com',
                'github_url'        => 'https://github.com/darkoCekovski/portfolio-darko-cekovski',
                'tech_stack'        => ['Laravel 12', 'Livewire 3', 'Alpine.js', 'Tailwind CSS', 'MySQL', 'Vite', 'Swiper.js'],
                'is_featured'       => true,
                'github_is_public'  => true,
                'order'             => 3,
            ],
            [
                'title'             => 'ImmoTech',
                'short_description' => 'Full-stack real estate platform with advanced property search, Swiper gallery with lightbox, 3-role permission system, Livewire CRUD forms, favourites, visit scheduling, and 9 languages across 3 themes.',
                'description'       => 'Full-stack real estate listing platform built with Laravel 11 and Livewire 3. The homepage opens with a full-viewport hero Swiper carousel of featured properties — each slide is a fully clickable link with an overlay chip showing price, listing type badge (For Sale / For Rent / Purchase Request), bedroom count and surface area. Below it sits an advanced search panel driven by Alpine.js tab switching across three listing types, with 9+ filter fields (city, country, price range, bedrooms, surface area, property type) submitted via GET parameters.

Property detail pages render a dual Swiper gallery — a main slider and a thumbnail strip — with an Alpine.js lightbox supporting keyboard navigation (arrow keys, Escape). Each detail page includes an owner management banner (edit, delete with confirmation) visible only to the listing owner or admin, a breadcrumb trail resolving to city and slug, and a live views counter per property. The inquiry form and free valuation tool are Livewire components that submit without page reload. An $isOwner PHP check controls the edit/delete UI entirely server-side.

The 3-role permission system (Admin / Agent / User) is enforced via canManageListings() checks throughout the UI. The user dashboard displays four metric cards — active listings, unread inquiries, upcoming visits, saved favourites — each resolved by Eloquent relationships at render time. The favourites system and visit scheduling are fully authenticated features. Property slugs follow the pattern {id}-{slug} and resolve via a dedicated properties.show route.

Nine languages (EN, DE, MK, RS, BG, HR, SI, GR, AL) are implemented via a gl() locale helper. Three themes (light/dark/system) use zero-flash switching. Swiper.js powers hero, gallery, thumbnail and mobile carousels throughout. The database is seeded with 90+ factory-generated properties using Unsplash image URLs.',
                'thumbnail'         => null,
                'demo_url'          => null,
                'github_url'        => 'https://github.com/darkoCekovski/immotech',
                'tech_stack'        => ['Laravel 11', 'Livewire 3', 'Alpine.js', 'Tailwind CSS', 'Swiper.js', 'MySQL', 'Vite'],
                'is_featured'       => true,
                'github_is_public'  => true,
                'order'             => 4,
            ],
            [
                'title'             => 'phpDeluxe',
                'short_description' => 'CMS-driven marketing platform for a managed website subscription service. All content is DB-driven, featuring a Swiper portfolio showcase, full-screen pricing modal, blog with Livewire pagination, and EN/DE domain-based routing.',
                'description'       => 'Marketing and service platform for a fully managed website subscription business. Architected as a CMS-driven Livewire application where all homepage content — hero banner, "Why Us" section, core competencies, portfolio gallery, customer reviews, and pricing — is loaded from the database via Eloquent accessors (getHomeBanner, getwhyChooseUs, getHomeGoodReason, getPortfolio), enabling admins to update all content without touching code.

The pricing section renders as a full-screen modal overlay with a services checklist and CTA, populated dynamically from the CMS. The portfolio showcase uses two Swiper carousels with tab switching — one for example websites, one for client logos. The blog features a custom Livewire pagination component and per-article dynamic SEO meta, OG and Twitter Card tags. The multilingual EN/DE implementation uses a gl() locale helper with separate route domains (phpdeluxe.com / phpdeluxe.de).

Transactional emails include a welcome email with credentials (client onboarding flow), an OTP verification email, and admin notifications — all using a shared master email layout. The contact page has noindex meta to prevent search engine indexing. The header implements a mobile slide-out navigation drawer toggled via vanilla JS.',
                'thumbnail'         => null,
                'demo_url'          => 'https://www.phpdeluxe.com',
                'github_url'        => null,
                'tech_stack'        => ['Laravel', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'Swiper.js', 'MySQL'],
                'is_featured'       => false,
                'github_is_public'  => false,
                'order'             => 5,
            ],
            [
                'title'             => 'AsiaFlirt',
                'short_description' => 'International dating platform (EN/DE/FR) with real-time Livewire chat, admin-moderated photo uploads, ID verification, trip planning with Swiper galleries, multilingual stories, membership tiers, and a Filament admin panel.',
                'description'       => 'International dating and social platform connecting European and Asian users through live video, profile browsing, trip planning, and community stories. Built on Laravel with Jetstream (2FA, OTP email verification, phone verification via Livewire). New users go through an Alpine.js multi-step onboarding wizard with live progress tracking before accessing the platform.

Profiles include preference settings, birthday-based age calculation, photo uploads via the livewire-media-library package with admin approval moderation (photos render blurred until approved). Identity verification uses an ID check upload flow with a dedicated Filament admin table column for approve/deny decisions. The Filament admin panel includes a custom widget tracking Tinify API image compression usage and remaining monthly quota.

The chat system is fully Livewire-driven with a three-pane layout (user list, message board, write message) and block/unblock functionality. Stories support multilingual content via getTranslation(\'heading\', gl()), likes, and multi-image galleries. The Trips feature lets users post and join travel plans with Swiper thumbnail galleries, admin-approved media, and like/join Livewire interactions. A membership/subscription page offers tiered plans. Unauthenticated visitors see a teaser modal component. Transactional emails cover welcome with credentials, OTP, newsletter, ID check approval, issue reports, and contact forms. Three languages: EN, DE, FR via gl() locale helper with hreflang SEO links.',
                'thumbnail'         => null,
                'demo_url'          => 'https://www.asiaflirt.com',
                'github_url'        => null,
                'tech_stack'        => ['Laravel', 'Jetstream', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'Filament', 'Swiper.js', 'MySQL', 'Tinify API'],
                'is_featured'       => false,
                'github_is_public'  => false,
                'order'             => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
