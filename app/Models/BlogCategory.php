<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    protected $fillable = [
        'slug',
        'name_en',
        'name_de',
        'sort_order',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'category_id');
    }

    // Returns the category name in the currently active app locale
    public function getNameAttribute(): string
    {
        return app()->getLocale() === 'de' ? $this->name_de : $this->name_en;
    }
}
