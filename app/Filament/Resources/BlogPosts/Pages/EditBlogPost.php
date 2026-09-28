<?php

namespace App\Filament\Resources\BlogPosts\Pages;

use App\Filament\Resources\BlogPosts\BlogPostResource;
use App\Models\BlogPost;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditBlogPost extends EditRecord
{
    protected static string $resource = BlogPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    // The form is bound to the English row, so the German fields are filled from the sibling row
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $german = $this->getRecord()->translation('de');

        $data['title_de'] = $german?->title;
        $data['slug_de']  = $german?->slug;
        $data['body_de']  = $german?->body;

        return $data;
    }

    // Saves the English row and updates (or creates, if missing) the German sibling in a single transaction
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        return DB::transaction(function () use ($record, $data): Model {
            $shared = [
                'category_id'  => $data['category_id'],
                'image_path'   => $data['image_path'] ?? null,
                'published_at' => $data['published_at'],
            ];

            $record->update($shared + [
                    'title' => $data['title'],
                    'slug'  => $data['slug'],
                    'body'  => $data['body'],
                ]);

            BlogPost::updateOrCreate(
                ['group_uuid' => $record->group_uuid, 'locale' => 'de'],
                $shared + [
                    'title' => $data['title_de'],
                    'slug'  => $data['slug_de'],
                    'body'  => $data['body_de'],
                ],
            );

            return $record;
        });
    }
}
