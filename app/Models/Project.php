<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'description_de',
        'short_description',
        'short_description_de',
        'thumbnail',
        'demo_url',
        'github_url',
        'tech_stack',
        'is_featured',
        'github_is_public',
        'order',
    ];

    protected $casts = [
        'tech_stack'       => 'array',
        'is_featured'      => 'boolean',
        'github_is_public' => 'boolean',
    ];

    public function getLocalizedDescriptionAttribute(): string
    {
        return app()->getLocale() === 'de' && $this->description_de
            ? $this->description_de
            : ($this->description ?? '');
    }

    public function getLocalizedShortDescriptionAttribute(): string
    {
        return app()->getLocale() === 'de' && $this->short_description_de
            ? $this->short_description_de
            : ($this->short_description ?? '');
    }
}
