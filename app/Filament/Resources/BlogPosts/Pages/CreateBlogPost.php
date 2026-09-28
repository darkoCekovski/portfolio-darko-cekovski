<?php

namespace App\Filament\Resources\BlogPosts\Pages;

use App\Filament\Resources\BlogPosts\BlogPostResource;
use App\Models\BlogPost;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateBlogPost extends CreateRecord
{
    protected static string $resource = BlogPostResource::class;

    // One form creates two rows (EN and DE) that share a group_uuid; both are saved in a single transaction
    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data): Model {
            $shared = [
                'group_uuid'   => (string) Str::uuid(),
                'category_id'  => $data['category_id'],
                'image_path'   => $data['image_path'] ?? null,
                'published_at' => $data['published_at'],
            ];

            $english = BlogPost::create($shared + [
                    'locale' => 'en',
                    'title'  => $data['title'],
                    'slug'   => $data['slug'],
                    'body'   => $data['body'],
                ]);

            BlogPost::create($shared + [
                    'locale' => 'de',
                    'title'  => $data['title_de'],
                    'slug'   => $data['slug_de'],
                    'body'   => $data['body_de'],
                ]);

            return $english;
        });
    }
}
