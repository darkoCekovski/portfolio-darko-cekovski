<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
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

    // Deleting a post also deletes its sibling in the other language, and removes the mirrored image once the whole group is gone.
    // Saving a post mirrors its image into httpdocs immediately, so it's visible without waiting for a deploy.
    // Changing a post's image removes the old mirrored copy, if no other post still references it.
    protected static function booted(): void
    {
        static::saved(function (BlogPost $post): void {
            if ($post->image_path) {
                $post->mirrorImageToHttpdocs();
            }
        });

        static::updating(function (BlogPost $post): void {
            if ($post->isDirty('image_path')) {
                $original = $post->getOriginal('image_path');

                if ($original && $original !== $post->image_path) {
                    static::removeMirroredImage($original, excludeId: $post->id);
                }
            }
        });

        static::deleting(function (BlogPost $post): void {
            $imagePath = $post->image_path;

            static::where('group_uuid', $post->group_uuid)
                ->where('id', '!=', $post->id)
                ->delete();

            if ($imagePath) {
                static::removeMirroredImage($imagePath);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    // Converts the markdown body into rendered HTML; raw HTML in the source is stripped and unsafe links are blocked
    public function getRenderedBodyAttribute(): string
    {
        return Str::markdown($this->body, [
            'html_input'         => 'strip',
            'allow_unsafe_links' => false,
        ]);
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
            ->with('category')
            ->where('category_id', $this->category_id)
            ->where('id', '!=', $this->id)
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }

    // Returns the sibling row of this post in another language, linked through the shared group_uuid
    public function translation(string $locale): ?self
    {
        return static::where('group_uuid', $this->group_uuid)
            ->where('locale', $locale)
            ->first();
    }

    // Copies the uploaded image from storage/app/public into httpdocs/storage, overwriting any existing copy at that path
    public function mirrorImageToHttpdocs(): void
    {
        $target = self::httpdocsImagePath($this->image_path);
        $source = Storage::disk('public')->path($this->image_path);

        if (!$target || !is_file($source)) {
            return;
        }

        if (!is_dir(dirname($target))) {
            mkdir(dirname($target), 0755, true);
        }

        copy($source, $target);
    }

    // Deletes the mirrored copy in httpdocs, but only once no post (other than $excludeId) still references this image
    private static function removeMirroredImage(string $imagePath, ?int $excludeId = null): void
    {
        $stillUsed = static::where('image_path', $imagePath)
            ->when($excludeId, fn ($query) => $query->where('id', '!=', $excludeId))
            ->exists();

        if ($stillUsed) {
            return;
        }

        $target = self::httpdocsImagePath($imagePath);

        if ($target && is_file($target)) {
            unlink($target);
        }
    }

    // Absolute path of the mirrored copy in httpdocs; returns null when HTTPDOCS_PUBLIC_PATH is not configured (e.g. locally)
    private static function httpdocsImagePath(string $relativePath): ?string
    {
        $root = config('filesystems.httpdocs_public_path');

        return $root
            ? rtrim($root, '/') . '/storage/' . ltrim($relativePath, '/')
            : null;
    }
}
