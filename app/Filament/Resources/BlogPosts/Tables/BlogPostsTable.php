<?php

namespace App\Filament\Resources\BlogPosts\Tables;

use App\Models\BlogPost;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogPostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Image')
                    ->disk('public'),
                TextColumn::make('title')
                    ->label('Title (EN)')
                    ->searchable()
                    ->sortable(),
                // The German title lives on the sibling row, so it is read from there
                TextColumn::make('german_title')
                    ->label('Title (DE)')
                    ->state(fn (BlogPost $record): ?string => $record->translation('de')?->title),
                TextColumn::make('category.name_en')
                    ->label('Category')
                    ->badge(),
                TextColumn::make('published_at')
                    ->label('Published')
                    ->date('d.m.Y')
                    ->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
