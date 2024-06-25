<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use App\Filament\Resources\CommentResource;
use App\Models\Comment;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestCommentsWidget extends BaseWidget
{

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Comment::query()->whereDate('created_at', '>', now()->subDays(14))
            )
            ->columns([
                TextColumn::make('user.name')->searchable()->sortable(),
                TextColumn::make('post.title')->searchable()->sortable(),
                TextColumn::make('comment')->searchable()->sortable(),
                TextColumn::make('created_at')->searchable()->sortable(),
            ])
            ->actions([
                Action::make('View')
                    ->url(fn (Comment $record): string => CommentResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
