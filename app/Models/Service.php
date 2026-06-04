<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'title',
        'description',
    ];

    protected $casts = [
        'title'       => 'array',
        'description' => 'array',
    ];

    public function getTranslatedTitleAttribute(): string
    {
        return $this->title[app()->getLocale()] ?? $this->title['en'] ?? '';
    }

    public function getTranslatedDescriptionAttribute(): string
    {
        return $this->description[app()->getLocale()] ?? $this->description['en'] ?? '';
    }
}
