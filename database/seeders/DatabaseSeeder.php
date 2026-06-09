<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            SkillsTableSeeder::class,
            // ProjectSeeder::class,
            // TestimonialSeeder::class,
        ]);
    }
}
