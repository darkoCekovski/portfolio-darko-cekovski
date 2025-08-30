<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ConvertTechStackToJsonSeeder extends Seeder
{
    public function run(): void
    {
        Project::all()->each(function ($project) {
            if (!empty($project->tech_stack)) {
                $techArray = explode(',', $project->tech_stack);
                $project->tech_stack = array_map('trim', $techArray);
                $project->save();
            }
        });
    }
}
