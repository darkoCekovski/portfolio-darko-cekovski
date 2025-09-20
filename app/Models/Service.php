<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Service extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'title',
        'description'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];

    public function getTranslatedTitleAttribute()
    {
        return $this->title[app()->getLocale()] ?? $this->title['en'];
    }

    public function getTranslatedDescriptionAttribute()
    {
        return $this->description[app()->getLocale()] ?? $this->description['en'];
    }
}

