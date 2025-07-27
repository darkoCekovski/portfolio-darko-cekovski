<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Project::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'thumbnail' => $this->faker->imageUrl(300, 200),
            'demo_url' => $this->faker->url,
            'github_url' => $this->faker->url,
            'tech_stack' => 'Laravel,Tailwind,Livewire',
        ];
    }
}
