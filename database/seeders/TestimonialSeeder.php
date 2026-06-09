<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::truncate();

        $testimonials = [
            [
                'name'        => 'Harry S.',
                'role'        => 'Web Designer/Developer · Fireswitch Media B.V.',
                'avatar'      => 'HS',
                'color'       => 'from-indigo-500 to-blue-500',
                'photo'       => null,
                'content'     => 'Working with Darko was seamless. He delivered high-quality work on time, communicated clearly, and ensured everything met our requirements. Highly recommended! A++',
                'order'       => 1,
                'is_featured' => true,
            ],
            [
                'name'        => 'Lena H.',
                'role'        => 'Marketing Lead · BrandBox',
                'avatar'      => 'LH',
                'color'       => 'from-sky-500 to-cyan-400',
                'photo'       => null,
                'content'     => 'Our new landing pages load in under a second and the contact form conversions have doubled. Darko understood our brand instantly and translated it into a design that we are proud to show to clients.',
                'order'       => 2,
                'is_featured' => true,
            ],
            [
                'name'        => 'Lucky S.',
                'role'        => 'Backend Developer · Fireswitch Media B.V.',
                'avatar'      => 'LS',
                'color'       => 'from-emerald-500 to-teal-400',
                'photo'       => null,
                'content'     => 'Working with Darko has been a fantastic experience. His attention to detail, clean code, and creative frontend solutions consistently elevate our projects. Highly reliable and a great team player!',
                'order'       => 3,
                'is_featured' => true,
            ],
            [
                'name'        => 'Marcus T.',
                'role'        => 'Product Owner · DigitalCraft',
                'avatar'      => 'MT',
                'color'       => 'from-violet-500 to-indigo-400',
                'photo'       => null,
                'content'     => 'Darko built our entire frontend from scratch — pixel-perfect, fully responsive, and blazing fast. He brought structure and clarity to a complex UI and delivered something we are genuinely proud to show. An exceptional frontend developer.',
                'order'       => 4,
                'is_featured' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
