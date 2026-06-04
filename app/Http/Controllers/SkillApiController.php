<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\JsonResponse;

class SkillApiController extends Controller
{
    public function show(string $slug): JsonResponse
    {
        $locale = request()->query('locale', app()->getLocale());
        app()->setLocale($locale);

        $skill = Skill::where('slug', $slug)->firstOrFail();

        return response()->json([
            'id'                  => $skill->id,
            'name'                => $skill->name,
            'slug'                => $skill->slug,
            'description'         => $skill->description,
            'proficiency'         => $skill->proficiency,
            'logo'                => $skill->logo ? asset($skill->logo) : null,
            'learning_source'     => $skill->learning_source,
            'experience_duration' => $skill->experience_duration,
        ]);
    }
}
