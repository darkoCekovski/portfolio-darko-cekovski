<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use App\Models\BlogPost;
use Closure;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Settings shared by both language versions of the post
                Section::make('Post settings')
                    ->schema([
                        Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name_en')
                            ->preload()
                            ->required(),
                        DateTimePicker::make('published_at')
                            ->label('Published at')
                            ->default(now())
                            ->required(),
                        FileUpload::make('image_path')
                            ->label('Cover image')
                            ->image()
                            ->disk('public')
                            ->directory('blog')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                // One tab per language, each with its own title, slug and text
                Tabs::make('Languages')
                    ->tabs([
                        Tab::make('English')->schema(self::languageFields('en')),
                        Tab::make('Deutsch')->schema(self::languageFields('de')),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    // Title, slug and text for one language. The English fields map to the model columns;
    // the German fields (suffix _de) are virtual and get saved on the sibling row by the page classes
    private static function languageFields(string $locale): array
    {
        $suffix = $locale === 'de' ? '_de' : '';
        $slugField = 'slug' . $suffix;

        return [
            TextInput::make('title' . $suffix)
                ->label('Title')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function (Get $get, Set $set, ?string $state) use ($slugField, $locale): void {
                    // Suggest a slug from the title, but only while the slug field is still empty
                    if (blank($get($slugField))) {
                        $set($slugField, Str::slug($state ?? '', '-', $locale));
                    }
                }),

            TextInput::make($slugField)
                ->label('Slug (part of the URL)')
                ->required()
                ->maxLength(255)
                ->alphaDash()
                ->rules([self::uniqueSlugRule($locale)]),

            MarkdownEditor::make('body' . $suffix)
                ->label('Text (Markdown)')
                ->required()
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsDirectory('blog/attachments')
                ->columnSpanFull(),
        ];
    }

    // Rejects a slug already used by another post in the same language; both rows of the edited post are ignored
    private static function uniqueSlugRule(string $locale): Closure
    {
        return fn (?BlogPost $record): Closure => function (string $attribute, mixed $value, Closure $fail) use ($locale, $record): void {
            $taken = BlogPost::query()
                ->where('locale', $locale)
                ->where('slug', $value)
                ->when($record, fn ($query) => $query->where('group_uuid', '!=', $record->group_uuid))
                ->exists();

            if ($taken) {
                $fail('This slug is already used by another post in this language.');
            }
        };
    }
}
