<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'proficiency',
        'logo',
        'learning_source',
        'experience_duration',
    ];

    /**
     * Auto-generate slug when name is set, if slug is not explicitly provided.
     */
    protected static function booted(): void
    {
        static::creating(function (self $skill) {
            if (empty($skill->slug)) {
                $skill->slug = Str::slug($skill->name);
            }
        });
    }
}
