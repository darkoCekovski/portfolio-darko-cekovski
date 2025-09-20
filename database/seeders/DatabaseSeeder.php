<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Example: create test projects with factories
        \App\Models\Project::factory(10)->create();

        // Call additional seeders
        $this->call([
            ServiceSeeder::class,
            // Add more seeders here as needed, e.g. UserSeeder::class
        ]);
    }
}
