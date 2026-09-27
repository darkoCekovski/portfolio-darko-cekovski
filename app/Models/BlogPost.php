<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'group_uuid',
        'locale',
        'category_id',
        'title',
        'slug',
        'body',
        'image_path',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    // Converts the markdown body into rendered HTML
    public function getRenderedBodyAttribute(): string
    {
        return Str::markdown($this->body);
    }

    // Plain-text excerpt shown on the card, truncated to ~160 characters
    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->rendered_body), 160);
    }

    // Estimated reading time based on a 200 words-per-minute average
    public function getReadTimeMinutesAttribute(): int
    {
        $words = str_word_count(strip_tags($this->rendered_body));

        return max(1, (int)ceil($words / 200));
    }

    // Restricts the query to a given language
    public function scopeLocale($query, string $locale)
    {
        return $query->where('locale', $locale);
    }

    // Restricts the query to a category slug; passing null returns all posts (used by the "Latest" filter)
    public function scopeCategory($query, ?string $slug)
    {
        return $slug
            ? $query->whereHas('category', fn($q) => $q->where('slug', $slug))
            : $query;
    }

    // Fetches related posts: same category, most recent first, excluding the current post
    public function relatedPosts(int $limit = 2)
    {
        return static::locale($this->locale)
            ->where('category_id', $this->category_id)
            ->where('id', '!=', $this->id)
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }
}
